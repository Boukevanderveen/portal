<?php

namespace App\Http\Livewire;

use App\Models\Uitje;
use Livewire\Component;
use Livewire\WithPagination;

class UitjeShow extends Component
{
    use WithPagination;

    //als het design van pagination niet meer werkt, deze hieronder gebruiken
    //protected $paginationTheme = 'bootstrap';

    public $leerjaar, $datum, $tijdstip, $locatie, $onderwerp, $uitje_id;

    protected function rules()
    {
        return [
            'leerjaar' => 'required|int',
            'datum' => 'required|date',
            'tijdstip' => 'required|date_format:H:i',
            'locatie' => 'required|string',
            'onderwerp' => 'required|string'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    // saveUitje staat in uitjeModal.blade.php bij de form
    public function saveUitje()
    {
        $validatedData = $this->validate();

        Uitje::create($validatedData);
        session()->flash('message', 'Uitje toegevoegd!');
        $this->emptyInput();
        $this->dispatchBrowserEvent('close-modal');
        
        //show error when input fields aren't filled in correctly        
        try {
            $this->validate(); 
        } catch (\Illuminate\Validation\ValidationException $e) { 

            throw $e;
        }
    }

    // update functie voor de uitjes
    public function editUitje(int $uitje_id)
    {
        $uitje = Uitje::find($uitje_id);
        if($uitje){
            $this->uitje_id = $uitje_id;
            $this->leerjaar = $uitje->leerjaar;
            $this->datum = $uitje->datum;
            $this->tijdstip = $uitje->tijdstip;
            $this->locatie = $uitje->locatie;
            $this->onderwerp = $uitje->onderwerp;
        }else{
            return redirect()->to('/uitjes');
        }
    }

    public function updateUitje()
    {
        $validatedData = $this->validate();

        Uitje::where('id', $this->uitje_id)->update([
            'leerjaar' => $validatedData['leerjaar'],
            'datum' => $validatedData['datum'],
            'tijdstip' => $validatedData['tijdstip'],
            'locatie' => $validatedData['locatie'],
            'onderwerp' => $validatedData['onderwerp'],
        ]);
        session()->flash('message', 'Uitje aangepast!');
        $this->emptyInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteUitje(int $uitje_id)
    {
        $this->uitje_id = $uitje_id;
    }

    public function destroyUitje()
    {
        Uitje::find($this->uitje_id)->delete();

        session()->flash('message', 'Uitje verwijdert!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->emptyInput();
    }

    //input fields legen na het submitten
    public function emptyInput()
    {
        $this->leerjaar = '';
        $this->datum = '';
        $this->tijdstip = '';
        $this->locatie = '';
        $this->onderwerp = '';
    }

    public function render()
    {
        $uitjes = Uitje::orderBy('id', 'asc')->paginate(10);
        
        if (auth()->user()->type == 'admin') {
            return view('livewire.admin/uitje-show', ['uitjes' => $uitjes]);
        } else {
            return view('livewire.user/uitje-show', ['uitjes' => $uitjes]);
        } 
    }
}
