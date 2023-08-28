<div>
    @include('livewire.admin/keuzeModal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h4>Keuzedeel CRUD
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#keuzeModal">
                        Keuzedeel toevoegen
                        </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Titel</th>
                                    <th>Uren</th>
                                    <th>Omschrijving</th>
                                    <th>Docent</th>
                                    <th>Periode</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($keuzes as $keuze)
                                <tr>
                                    <td>{{ $keuze->code }}</td>
                                    <td>{{ $keuze->titel }}</td>
                                    <td>{{ $keuze->uren }}</td>
                                    <td>{{ $keuze->omschrijving }}</td>
                                    <td>{{ $keuze->docent }}</td>
                                    <td>{{ $keuze->periode }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateKeuzeModal" wire:click="editKeuze({{ $keuze->id }})" class="btn btn-primary"><span class="bi-pencil"></span>
                                            <!-- Edit -->
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteKeuzeModal" wire:click="deleteKeuze({{ $keuze->id }})" class="btn btn-danger"><span class="bi-trash"></span>
                                            <!-- Delete -->
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">Momenteel geen keuzedelen!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div> 
                            <!-- kan ook keuzedelen zijn -->
                            {{$keuzes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>