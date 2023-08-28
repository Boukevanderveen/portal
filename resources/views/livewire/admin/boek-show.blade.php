<div>
    @include('livewire.admin/boekModal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h4>Boeken CRUD
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#boekModal">
                        Boek toevoegen
                        </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover table-striped table-sm">
                        <colgroup>
                            <col style="width: 20%" />
                            <col style="width: 20%" />
                            <col style="width: 20%" />
                            <col style="width: 20%" />
                            <col style="width: 10%" />
                        </colgroup>
                            <thead>
                                <tr>
                                    <th>Omschrijving</th>
                                    <th>isbn</th>
                                    <th>prijs</th>
                                    <th>leerjaar</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($boeken as $boek)
                                <tr>
                                    <td>{{ $boek->omschrijving }}</td>
                                    <td>{{ $boek->isbn }}</td>
                                    <td>{{ $boek->prijs }}</td>
                                    <td>{{ $boek->leerjaar }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateBoekModal" wire:click="editBoek({{ $boek->id }})" class="btn btn-primary"><span class="bi-pencil"></span>
                                            <!-- Edit -->
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteBoekModal" wire:click="deleteBoek({{ $boek->id }})" class="btn btn-danger"><span class="bi-trash"></span>
                                            <!-- Delete -->
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Geen boeken!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div> 
                            {{$boeken->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

