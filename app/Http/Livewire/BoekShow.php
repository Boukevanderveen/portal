<?php

namespace App\Http\Livewire;

use App\Models\Boek;
use Livewire\Component;
use Livewire\WithPagination;

class BoekShow extends Component
{
    use WithPagination;
    
    //als het design van pagination niet meer werkt, deze hieronder gebruiken
    //protected $paginationTheme = 'bootstrap';

    public $omschrijving, $isbn, $prijs, $leerjaar, $boek_id;

    protected function rules()
    {
        return [
            'omschrijving' => 'required|string',
            'isbn' => 'required|string',
            'prijs' => 'required|string',
            'leerjaar' => 'required|string',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    // saveBoek staat in boekModal.blade.php bij de form
    public function saveBoek()
    {
        $validatedData = $this->validate();

        Boek::create($validatedData);
        session()->flash('message', 'Boek toegevoegd!');
        $this->emptyInput();
        $this->dispatchBrowserEvent('close-modal');
        
        //show error when input fields aren't filled in correctly        
        try {
            $this->validate(); 
        } catch (\Illuminate\Validation\ValidationException $e) { 
    
            throw $e;
        }
    }

    // update functie voor de Boeken
    public function editBoek(int $boek_id)
    {
        $boek = Boek::find($boek_id);
        if($boek){
            $this->boek_id = $boek->id;
            $this->omschrijving = $boek->omschrijving;
            $this->isbn = $boek->isbn;
            $this->prijs = $boek->prijs;
            $this->leerjaar = $boek->leerjaar;
        }else{
            return redirect()->to('/boekenlijst');
        }
    }

    public function updateBoek()
    {
        $validatedData = $this->validate();

        Boek::where('id', $this->boek_id)->update([
            'omschrijving' => $validatedData['omschrijving'],
            'isbn' => $validatedData['isbn'],
            'prijs' => $validatedData['prijs'],
            'leerjaar' => $validatedData['leerjaar'],
        ]);
        session()->flash('message', 'Boeken aangepast!');
        $this->emptyInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function destroyBoek()
    {
        Boek::find($this->boek_id)->delete();

        session()->flash('message', 'Boek verwijdert!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->emptyInput();
    }

    public function deleteBoek(int $boek_id)
    {
        $this->boek_id = $boek_id;
    }  
    
    //input fields legen na het submitten
    public function emptyInput()
    {
        $this->omschrijving = '';
        $this->isbn = '';
        $this->prijs = '';
        $this->leerjaar = '';
    }

    public function render()
    {
        $boeken = Boek::orderBy('id', 'asc')->paginate(10);
        
        if (auth()->user()->type == 'admin') {
            return view('livewire.admin/boek-show', ['boeken' => $boeken]);
        } else {
            return view('livewire.user/boek-show', ['boeken' => $boeken]);
        } 
    }
}
