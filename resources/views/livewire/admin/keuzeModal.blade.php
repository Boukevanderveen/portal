<!-- Modal -->
<div wire:ignore.self class="modal fade" id="keuzeModal" tabindex="-1" aria-labelledby="keuzeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="keuzeModalLabel">Keuzedeel aanmaken</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="saveKeuze">
      <div class="modal-body">
        <!-- code keuzedeel -->
        <div class="mb-3">
          <label>Code</label>
          <input type="text" wire:model="code" class="form-control">
          @error('code') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Titel keuzedeel -->
        <div class="mb-3">
          <label>Titel</label>
          <input type="text" wire:model="titel" class="form-control">
          @error('titel') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Uren keuzedeel-->
        <div class="mb-3">
          <label>Uren</label>
          <input type="number" wire:model="uren" class="form-control">
          @error('uren') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Omschrijving keuzedeel-->
        <div class="mb-3">
          <label>Omschrijving</label>
          <textarea wire:model="omschrijving" class="form-control" rows="8"></textarea>
          @error('omschrijving') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Docent keuzedeel-->
        <div class="mb-3">
          <label>Docent</label>
          <input type="text" wire:model="docent" class="form-control">
          @error('docent') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- periode keuzedeel-->
        <div class="mb-3">
          <label>Periode</label>
          <input type="text" wire:model="periode" class="form-control">
          @error('periode') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Modal voor het updaten van Keuzedelen -->
<div wire:ignore.self class="modal fade" id="updateKeuzeModal" tabindex="-1" aria-labelledby="updateKeuzeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateKeuzeModalLabel">Keuzedeel aanpassen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="updateKeuze">
      <div class="modal-body">
        <!-- code keuzedeel -->
        <div class="mb-3">
          <label>Code</label>
          <input type="text" wire:model="code" class="form-control">
          @error('naam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Titel keuzedeel -->
        <div class="mb-3">
          <label>Titel</label>
          <input type="text" wire:model="titel" class="form-control">
          @error('naam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Uren keuzedeel-->
        <div class="mb-3">
          <label>Uren</label>
          <input type="number" wire:model="uren" class="form-control">
          @error('naam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Omschrijving keuzedeel-->
        <div class="mb-3">
          <label>Omschrijving</label>
          <textarea wire:model="omschrijving" class="form-control" rows="8"></textarea>
          @error('naam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Docent keuzedeel-->
        <div class="mb-3">
          <label>Docent</label>
          <input type="textarea" wire:model="docent" class="form-control">
          @error('naam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- periode keuzedeel-->
        <div class="mb-3">
          <label>Periode</label>
          <input type="text" wire:model="periode" class="form-control">
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

<!-- Modal voor het deleten van keuzedelen -->
<div wire:ignore.self class="modal fade" id="deleteKeuzeModal" tabindex="-1" aria-labelledby="deleteKeuzeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteKeuzeModalLabel">Keuzedeel verwijderen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="destroyKeuze">
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