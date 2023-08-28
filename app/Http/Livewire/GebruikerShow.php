<?php

namespace App\Http\Livewire;

use App\Models\Gebruiker;
use Livewire\Component;
use Livewire\WithPagination;

class GebruikerShow extends Component
{
    use WithPagination;

    public $name, $gebruiker_id;

    protected function rules()
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    // update functie voor de Gebruiker
    public function editGebruiker(int $gebruiker_id)
    {
        $gebruiker = Gebruiker::find($gebruiker_id);
        if($gebruiker){
            $this->gebruiker_id = $gebruiker->id;
            $this->name = $gebruiker->code;
        }else{
            return redirect()->to('/gebruikers');
        }
    }

    public function updateGebruiker()
    {
        $validatedData = $this->validate();

        Gebruiker::where('id', $this->gebruiker_id)->update([
            'name' => $validatedData['name'],
        ]);
        session()->flash('message', 'Gebruiker aangepast!');
        $this->emptyInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function destroyGebruiker()
    {
        Gebruiker::find($this->gebruiker_id)->delete();

        session()->flash('message', 'Gebruiker verwijdert!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->emptyInput();
    }

    public function deleteGebruiker(int $gebruiker_id)
    {
        $this->gebruiker_id = $gebruiker_id;
    }  
    
    //input fields legen na het submitten
    public function emptyInput()
    {
        $this->name = '';
    }

    public function render()
    {
        $gebruikers = Gebruiker::orderBy('id', 'asc')->paginate(10);
        
        return view('livewire.admin/gebruiker-show', ['gebruikers' => $gebruikers]);
    }
}
