<div>
    @include('livewire.admin/toetsModal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h4>Toets CRUD
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#toetsModal">
                        Toets toevoegen
                        </button>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless table-hover table-striped table-sm caption-top">
                            <caption><h5>Klas 1</h5></caption>
                            <thead>
                                <tr>
                                    <th>Leerjaar</th>
                                    <th>Periode</th>
                                    <th>Toets</th>
                                    <th>Datum</th>
                                    <th>Tijdstip</th>
                                    <th>Herkansing</th>
                                    <th>Her-tijdstip</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody >
                                @forelse ($toetsen as $toets)
                                <tr>
                                    <td>{{ $toets->leerjaar }}</td>
                                    <td>{{ $toets->periode }}</td>
                                    <td>{{ $toets->toets }}</td>
                                    <td>{{ $toets->datum }}</td>
                                    <td>{{ $toets->tijdstip }}</td>
                                    <td>{{ $toets->herkansing }}</td>
                                    <td>{{ $toets->herTijdstip }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateToetsModal" wire:click="editToets({{ $toets->id }})" class="btn btn-primary"><span class="bi-pencil"></span>
                                            <!-- Edit -->
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteToetsModal" wire:click="deleteToets({{ $toets->id }})" class="btn btn-danger"><span class="bi-trash"></span>
                                            <!-- Delete -->
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">Momenteel geen toetsen!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                        <div> 
                            {{$toetsen->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>