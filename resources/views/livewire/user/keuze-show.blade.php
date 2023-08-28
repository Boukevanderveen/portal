<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h4>Keuzedelen
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
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">Momenteel geen keuzedelen!</td>
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