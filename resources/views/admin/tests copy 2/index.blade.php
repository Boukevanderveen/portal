@extends('layouts.admin')
@section('content')
<div class="grid grid-cols-1 gap-4">

        <div class="text-3xl col-start-1 col-span-1">
            Toetsen
            <button onclick="window.location='{{ route('admin.tests.create') }}'" type="button"  class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nieuwe toets</button>
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
                            Tijd
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Datum
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Periode
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gemaakt op:
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Inschrijvingen
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $test)
                    <tr class="bg-white border-b ">
                        <td class="px-6 py-4">
                            {{$test->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$test->time}}
                        </td>
                        <td class="px-6 py-4">
                            {{$test->date}}
                        </td>
                        <td class="px-6 py-4">
                            {{$test->period}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $test->created_at->format('d-m-Y')}}
                        </td>
                        <td class="px-6 py-4">
                            @if($test->registerable) Toegestaan @else Niet toegestaan @endif
                        </td>
                        <td>

                            <form method="post" action="{{ route('admin.tests.destroy', $test) }}"> @csrf
                                @method('delete')
                            <button type="submit"
                            onclick="return confirm('Weet je zeker dat je {{ $test->name }} wilt verwijderen?')" role="button" class="fa fa-trash float-right mr-5" aria-hidden="true">
                               
                            </button>

                            <a href="{{ route('admin.tests.edit', $test) }}">
                                <i class="fa fa-pencil float-right mr-5" aria-hidden="true"></i>
                            </a>
                            <a @if($test->registerable) href="{{route('admin.tests.registrations.index', $test)}}" @endif class="fa-solid fa-user-group @if(!$test->registerable)text-slate-600 @endif">
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
@endsection
