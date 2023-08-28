<!-- Modal -->
<div wire:ignore.self class="modal fade" id="boekModal" tabindex="-1" aria-labelledby="boekModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="boekModalLabel">Boek aanmaken</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="saveBoek">
      <div class="modal-body">
        <!-- Omschrijving boek -->
        <div class="mb-3">
        <label>Omschrijving</label>
          <textarea wire:model="omschrijving" class="form-control" rows="5"></textarea>
          @error('omschrijving') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- ISBN boek -->
        <div class="mb-3">
          <label>ISBN</label>
          <input type="text" wire:model="isbn" class="form-control">
          @error('isbn') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Prijs boek -->
        <div class="mb-3">
          <label>Prijs</label>
          <input type="text" wire:model="prijs" class="form-control">
          @error('prijs') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Leerjaar boek-->
        <div class="mb-3">
          <label>Leerjaar</label>
          <input type="number" wire:model="leerjaar" class="form-control" min="1" max="4">
          @error('leerjaar') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Modal voor het updaten van Boeken -->
<div wire:ignore.self class="modal fade" id="updateBoekModal" tabindex="-1" aria-labelledby="updateBoekModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateBoekModalLabel">Boek aanpassen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="updateBoek">
      <div class="modal-body">
        <!-- Omschrijving boek -->
        <div class="mb-3">
        <label>Omschrijving</label>
          <textarea wire:model="omschrijving" class="form-control" rows="5"></textarea>
          @error('omschrijving') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- ISBN boek -->
        <div class="mb-3">
          <label>ISBN</label>
          <input type="text" wire:model="isbn" class="form-control">
          @error('isbn') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Prijs boek -->
        <div class="mb-3">
          <label>Prijs</label>
          <input type="text" wire:model="prijs" class="form-control">
          @error('prijs') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Leerjaar boek-->
        <div class="mb-3">
          <label>Leerjaar</label>
          <input type="number" wire:model="leerjaar" class="form-control" min="1" max="4">
          @error('leerjaar') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Modal voor het deleten van Boeken -->
<div wire:ignore.self class="modal fade" id="deleteBoekModal" tabindex="-1" aria-labelledby="deleteBoekModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteBoekModalLabel">Boek verwijderen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="destroyBoek">
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