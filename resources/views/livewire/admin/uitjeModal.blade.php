<!-- Modal -->
<div wire:ignore.self class="modal fade" id="uitjeModal" tabindex="-1" aria-labelledby="uitjeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="uitjeModalLabel">Uitje aanmaken</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="saveUitje">
      <div class="modal-body">
        <!-- leerjaar -->
        <div class="mb-3">
          <label>Leerjaar</label>
          <input type="number" wire:model="leerjaar" class="form-control" min="1" max="4">
          @error('leerjaar') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- datum van het uitje -->
        <div class="mb-3">
          <label>Datum</label>
          <input type="date" wire:model="datum" class="form-control">
          @error('datum') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- tijdstip van het uitje-->
        <div class="mb-3">
          <label>Tijdstip</label>
          <input type="time" wire:model="tijdstip" class="form-control">
          @error('tijdstip') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- locatie -->
        <div class="mb-3">
          <label>Locatie</label>
          <input type="text" wire:model="locatie" class="form-control">
          @error('locatie') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- onderwerp -->
        <div class="mb-3">
          <label>Onderwerp</label>
          <input type="text" wire:model="onderwerp" class="form-control">
          @error('onderwerp') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Opslaan</button>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal voor het updaten van uitjes -->
<div wire:ignore.self class="modal fade" id="updateUitjeModal" tabindex="-1" aria-labelledby="updateUitjeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateUitjeModalLabel">Uitje aanpassen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="updateUitje">
      <div class="modal-body">
        <!-- leerjaar -->
        <div class="mb-3">
          <label>Leerjaar</label>
          <input type="number" wire:model="leerjaar" class="form-control" min="1" max="4">
          @error('naam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- datum van het uitje -->
        <div class="mb-3">
          <label>Datum</label>
          <input type="date" wire:model="datum" class="form-control">
          @error('datum') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- tijdstip van het uitje -->
        <div class="mb-3">
          <label>Tijdstip</label>
          <input type="time" wire:model="tijdstip" class="form-control">
          @error('tijdstip') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <!-- locatie -->
        <div class="mb-3">
          <label>Locatie</label>
          <input type="text" wire:model="locatie" class="form-control">
          @error('naam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- onderwerp -->
        <div class="mb-3">
          <label>Onderwerp</label>
          <input type="text" wire:model="onderwerp" class="form-control">
          @error('naam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal voor het deleten van uitjes -->
<div wire:ignore.self class="modal fade" id="deleteUitjeModal" tabindex="-1" aria-labelledby="deleteUitjeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteUitjeModalLabel">Uitje verwijderen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="destroyUitje">
      <div class="modal-body">

      <h4>Weet u zeker dat u de data wilt verwijderen?</h4>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary" wire:click="closeModal" data-bs-dismiss="modal">verwijderen</button>
      </div>
      </form>

    </div>
  </div>
</div>