<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h4>Boekenlijst
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover table-striped table-sm">
                        <colgroup>
                            <col style="width: 25%" />
                            <col style="width: 25%" />
                            <col style="width: 25%" />
                            <col style="width: 25%" />
                        </colgroup>
                            <thead>
                                <tr>
                                    <th>Omschrijving</th>
                                    <th>isbn</th>
                                    <th>prijs</th>
                                    <th>leerjaar</th>
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
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Geen boeken!</td>
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

