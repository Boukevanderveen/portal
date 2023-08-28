<?php

namespace App\Http\Livewire;

use App\Models\Keuze;
use Livewire\Component;
use Livewire\WithPagination;

class KeuzeShow extends Component
{
        use WithPagination;
    
        //als het design van pagination niet meer werkt, deze hieronder gebruiken
        //protected $paginationTheme = 'bootstrap';
    
        public $code, $titel, $uren, $omschrijving, $docent, $periode, $keuze_id;
    
        protected function rules()
        {
            return [
                'code' => 'required|string',
                'titel' => 'required|string',
                'uren' => 'required|int',
                'omschrijving' => 'required|string',
                'docent' => 'required|string',
                'periode' => 'required|string'
            ];
        }
    
        public function updated($fields)
        {
            $this->validateOnly($fields);
        }
    
        // saveKeuze staat in keuzeModal.blade.php bij de form
        public function saveKeuze()
        {
            $validatedData = $this->validate();
    
            Keuze::create($validatedData);
            session()->flash('message', 'Keuzedeel toegevoegd!');
            $this->emptyInput();
            $this->dispatchBrowserEvent('close-modal');
            
            //show error when input fields aren't filled in correctly        
            try {
                $this->validate(); 
            } catch (\Illuminate\Validation\ValidationException $e) { 
        
                throw $e;
            }
        }
    
        // update functie voor de Keuzedelen
        public function editKeuze(int $keuze_id)
        {
            $keuze = Keuze::find($keuze_id);
            if($keuze){
                $this->keuze_id = $keuze->id;
                $this->code = $keuze->code;
                $this->titel = $keuze->titel;
                $this->uren = $keuze->uren;
                $this->omschrijving = $keuze->omschrijving;
                $this->docent = $keuze->docent;
                $this->periode = $keuze->periode;
            }else{
                return redirect()->to('/keuzedelen');
            }
        }
    
        public function updateKeuze()
        {
            $validatedData = $this->validate();
    
            Keuze::where('id', $this->keuze_id)->update([
                'code' => $validatedData['code'],
                'titel' => $validatedData['titel'],
                'uren' => $validatedData['uren'],
                'omschrijving' => $validatedData['omschrijving'],
                'docent' => $validatedData['docent'],
                'periode' => $validatedData['periode'],
            ]);
            session()->flash('message', 'Keuzedeel aangepast!');
            $this->emptyInput();
            $this->dispatchBrowserEvent('close-modal');
        }
    
        public function destroyKeuze()
        {
            Keuze::find($this->keuze_id)->delete();
    
            session()->flash('message', 'Keuzedeel verwijdert!');
            $this->dispatchBrowserEvent('close-modal');
        }
    
        public function closeModal()
        {
            $this->emptyInput();
        }
    
        public function deleteKeuze(int $keuze_id)
        {
            $this->keuze_id = $keuze_id;
        }  
        
        //input fields legen na het submitten
        public function emptyInput()
        {
            $this->code = '';
            $this->titel = '';
            $this->uren = '';
            $this->omschrijving = '';
            $this->docent = '';
            $this->periode = '';
        }
    
        public function render()
        {
            $keuzes = Keuze::orderBy('id', 'asc')->paginate(10);
            
            if (auth()->user()->type == 'admin') {
                return view('livewire.admin/keuze-show', ['keuzes' => $keuzes]);
            } else {
                return view('livewire.user/keuze-show', ['keuzes' => $keuzes]);
            } 
        }
}
