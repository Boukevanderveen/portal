<div>
    @include('livewire.admin/gebruikerModal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h4>Gebruiker CRUD
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Naam</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($gebruikers as $gebruiker)
                                <tr>
                                    <td>{{ $gebruiker->id }}</td>
                                    <td>{{ $gebruiker->name }}</td>
                                    <td>{{ $gebruiker->email }}</td>
                                    <!-- displaying role of logged in user for all users -->
                                    <td>{{ Auth::user()->type }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateGebruikerModal" wire:click="editGebruiker({{ $gebruiker->id }})" class="btn btn-primary"><span class="bi-pencil"></span>
                                            <!-- Edit -->
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteGebruikerModal" wire:click="deleteGebruiker({{ $gebruiker->id }})" class="btn btn-danger"><span class="bi-trash"></span>
                                            <!-- Delete -->
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Geen gebruikers!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div> 
                            {{$gebruikers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
