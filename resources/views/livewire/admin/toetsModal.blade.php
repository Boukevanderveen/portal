<!-- Modal -->
<div wire:ignore.self class="modal fade" id="toetsModal" tabindex="-1" aria-labelledby="toetsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="toetsModalLabel">Toets aanmaken</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="saveToets">
      <div class="modal-body">
        <!-- leerjaar -->
        <div class="mb-3">
          <label>Leerjaar</label>
          <input type="number" wire:model="leerjaar" class="form-control" min="1" max="4">
          @error('leerjaar') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- naam toets -->
        <div class="mb-3">
          <label>Periode</label>
          <input type="text" wire:model="periode" class="form-control">
          @error('periode') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- naam toets -->
        <div class="mb-3">
          <label>Toets naam</label>
          <input type="text" wire:model="toets" class="form-control">
          @error('toets') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- datum van de toets -->
        <div class="mb-3">
          <label>Datum</label>
          <input type="date" wire:model="datum" class="form-control">
          @error('datum') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- tijdstip van de toets-->
        <div class="mb-3">
          <label>Tijdstip</label>
          <input type="time" wire:model="tijdstip" class="form-control">
          @error('tijdstip') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- naam toets -->
        <div class="mb-3">
          <label>Herkansing</label>
          <input type="date" wire:model="herkansing" class="form-control">
          @error('herkansing') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- naam toets -->
        <div class="mb-3">
          <label>Her-tijdstip</label>
          <input type="time" wire:model="herTijdstip" class="form-control">
          @error('herTijdstip') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Modal voor het updaten van toetsen -->
<div wire:ignore.self class="modal fade" id="updateToetsModal" tabindex="-1" aria-labelledby="updateToetsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateToetsModalLabel">Toets aanpassen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="updateToets">
      <div class="modal-body">
        <!-- leerjaar -->
        <div class="mb-3">
          <label>Leerjaar</label>
          <input type="number" wire:model="leerjaar" class="form-control" min="1" max="4">
          @error('leerjaar') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- naam toets -->
        <div class="mb-3">
          <label>Periode</label>
          <input type="text" wire:model="periode" class="form-control">
          @error('periode') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- naam toets -->
        <div class="mb-3">
          <label>Toets naam</label>
          <input type="text" wire:model="toets" class="form-control">
          @error('toets') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- datum van de toets -->
        <div class="mb-3">
          <label>Datum</label>
          <input type="date" wire:model="datum" class="form-control">
          @error('datum') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- tijdstip van de toets-->
        <div class="mb-3">
          <label>Tijdstip</label>
          <input type="time" wire:model="tijdstip" class="form-control">
          @error('tijdstip') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- naam toets -->
        <div class="mb-3">
          <label>Herkansing</label>
          <input type="date" wire:model="herkansing" class="form-control">
          @error('herkansing') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- naam toets -->
        <div class="mb-3">
          <label>Her-tijdstip</label>
          <input type="time" wire:model="herTijdstip" class="form-control">
          @error('herTijdstip') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Modal voor het deleten van toetsen -->
<div wire:ignore.self class="modal fade" id="deleteToetsModal" tabindex="-1" aria-labelledby="deleteToetsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteToetsModalLabel">Toets verwijderen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="destroyToets">
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