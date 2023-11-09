@extends('layouts.admin')
@section('content')
<div class="grid grid-cols-1 gap-4">

        <div class="text-3xl col-start-1 col-span-1">
            Project weken
            <button onclick="window.location='{{ route('admin.projectweeks.create') }}'" type="button"  class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nieuwe projectweek</button>
        </div>

        <div class="max-w-full  overflow-hidden shadow-lg">
        <div class="relative  row-start-2 row-span-1 border">
            <table class="w-full text-sm text-left ">
                <thead class="text-xs  uppercase ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Naam
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Periode
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Week
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Start-datum
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Eind-datum
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Doelgroep
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Inschrijven
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gemaakt op:
                    </tr>
                </thead>
                <tbody>
                    @foreach($projectweeks as $projectweek)
                    <tr class="bg-white border-b ">
                        <td class="px-6 py-4">
                            {{$projectweek->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$projectweek->period}}
                        </td>
                        <td class="px-6 py-4">
                            {{$projectweek->week}}
                        </td>
                        <td class="px-6 py-4">
                            {{$projectweek->start_date}}
                        </td>
                        <td class="px-6 py-4">
                            {{$projectweek->end_date}}
                        </td>
                        <td class="px-6 py-4">
                            {{$projectweek->target_class}}
                        </td>
                        <td class="px-6 py-4">
                            @if($projectweek->registerable) Toegestaan @else Niet toegestaan @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $projectweek->created_at->format('d-m-Y')}}
                        </td>

                        <td>
                            <form method="post" action="{{ route('admin.projectweeks.destroy', $projectweek) }}"> @csrf
                                @method('delete')
                            <button type="submit"
                            onclick="return confirm('Weet je zeker dat je {{ $projectweek->name }} wilt verwijderen?')" role="button" class="fa fa-trash float-right mr-5" aria-hidden="true">
                               
                            </button>

                            <a href="{{ route('admin.projectweeks.edit', $projectweek) }}">
                                <i class="fa fa-pencil float-right mr-5" aria-hidden="true"></i>
                            </a>
                            <a @if($projectweek->registerable) href="{{route('admin.projectweeks.registrations.index', $projectweek)}}" @endif class="fa-solid fa-user-group @if(!$projectweek->registerable)text-slate-600 @endif">
                            </a>
                        </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
</div>


    </div>
    {{$projectweeks->links()}}
@endsection
