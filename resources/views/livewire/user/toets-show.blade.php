<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h4>Toetsen
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
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">Momenteel geen toetsen!</td>
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