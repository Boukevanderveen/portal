<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h4>Uitjes & Gastsprekers
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Leerjaar</th>                                   
                                    <th>Datum</th>
                                    <th>Tijdstip</th>
                                    <th>Locatie</th>
                                    <th>Onderwerp</th>                                    
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($uitjes as $uitje)
                                <tr>
                                    <td>{{ $uitje->leerjaar }}</td>
                                    <td>{{ $uitje->datum }}</td>
                                    <td>{{ $uitje->tijdstip }}</td>
                                    <td>{{ $uitje->locatie }}</td>
                                    <td>{{ $uitje->onderwerp }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Momenteel geen uitjes!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div> 
                            {{$uitjes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
