<?php

namespace App\Http\Livewire;

use App\Models\Toets;
use Livewire\Component;
use Livewire\WithPagination;

class ToetsShow extends Component
{
    use WithPagination;

    //als het design van pagination niet meer werkt, deze hieronder gebruiken
    //protected $paginationTheme = 'bootstrap';

    public $leerjaar, $periode, $toets, $datum, $tijdstip, $herkansing, $herTijdstip, $toets_id;

    protected function rules()
    {
        return [
            'leerjaar' => 'required|string',
            'periode' => 'required|string',
            'toets' => 'required|string',
            'datum' => 'required|date',
            'tijdstip' => 'required|date_format:H:i',
            'herkansing' => 'required|date',
            'herTijdstip' => 'required|date_format:H:i',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    // saveToets staat in toetsModal.blade.php bij de form
    public function saveToets()
    {
        $validatedData = $this->validate();

        Toets::create($validatedData);
        session()->flash('message', 'Toets toegevoegd!');
        $this->emptyInput();
        $this->dispatchBrowserEvent('close-modal');
        
        //show error when input fields aren't filled in correctly        
        try {
            $this->validate(); 
        } catch (\Illuminate\Validation\ValidationException $e) { 

            throw $e;
        }
    }

    // update functie voor de toets
    public function editToets(int $toets_id)
    {
        $toets = Toets::find($toets_id);
        if($toets){
            $this->toets_id = $toets->id;
            $this->leerjaar = $toets->leerjaar;
            $this->periode = $toets->periode;
            $this->toets = $toets->toets;
            $this->datum = $toets->datum;
            $this->tijdstip = $toets->tijdstip;
            $this->herkansing = $toets->herkansing;
            $this->herTijdstip = $toets->herTijdstip;
        }else{
            return redirect()->to('/toetsen');
        }
    }

    public function updateToets()
    {
        $validatedData = $this->validate();

        Toets::where('id', $this->toets_id)->update([
            'leerjaar' => $validatedData['leerjaar'],
            'periode' => $validatedData['periode'],
            'toets' => $validatedData['toets'],
            'datum' => $validatedData['datum'],
            'tijdstip' => $validatedData['tijdstip'],
            'herkansing' => $validatedData['herkansing'],
            'herTijdstip' => $validatedData['herTijdstip'],
        ]);
        session()->flash('message', 'Toets aangepast!');
        $this->emptyInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteToets(int $toets_id)
    {
        $this->toets_id = $toets_id;
    }

    public function destroyToets()
    {
        Toets::find($this->toets_id)->delete();

        session()->flash('message', 'Toets verwijdert!');
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
        $this->periode = '';
        $this->toets = '';
        $this->datum = '';
        $this->tijdstip = '';
        $this->herkansing = '';
        $this->herTijdstip = '';
    }

    public function render()
    {
        $toetsen = Toets::orderBy('id', 'asc')->paginate(10);
        
        if (auth()->user()->type == 'admin') {
            return view('livewire.admin/toets-show', ['toetsen' => $toetsen]);
        } else {
            return view('livewire.user/toets-show', ['toetsen' => $toetsen]);
        }           
    }
}
