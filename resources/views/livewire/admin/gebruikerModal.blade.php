<!-- Modal voor het updaten van Gebruiker -->
<div wire:ignore.self class="modal fade" id="updateGebruikerModal" tabindex="-1" aria-labelledby="updateGebruikerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateGebruikerModalLabel">Gebruiker aanpassen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="updateGebruiker">
      <div class="modal-body">
        <!-- naam gebruiker -->
        <div class="mb-3">
          <label>Naam</label>
          <input type="text" wire:model="name" class="form-control">
          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Modal voor het deleten van gebruiker -->
<div wire:ignore.self class="modal fade" id="deleteGebruikerModal" tabindex="-1" aria-labelledby="deleteGebruikerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteGebruikerModalLabel">Gebruiker verwijderen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="destroyGebruiker">
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