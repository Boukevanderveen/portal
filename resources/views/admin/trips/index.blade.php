@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-1 gap-4">

        <div class="text-3xl col-start-1 col-span-1">
            Uitjes
            <button onclick="window.location='{{ route('admin.trips.create') }}'" type="button"
                class="float-right focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Nieuw
                uitje</button>
        </div>

        <div class="max-w-full  overflow-hidden shadow-lg">
            <div class="relative  row-start-2 row-span-1 border">
                <table class="w-full text-sm text-left bg-[#3a5757]">
                    <thead class="text-xs  uppercase text-white ">                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Naam
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tijdstip
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Datum
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Schooljaar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Locatie
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gemaakt op:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trips as $trip)
                            <tr class="bg-white border-b ">
                                <td class="px-6 py-4">
                                    {{ $trip->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $trip->time }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $trip->date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $trip->school_year }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $trip->location }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $trip->created_at->format('d-m-Y') }}
                                </td>
                                <td>
                                    <form method="post" action="{{ route('admin.trips.destroy', $trip) }}"> @csrf
                                        @method('delete')
                                        <button type="submit"
                                            onclick="return confirm('Weet je zeker dat je {{ $trip->name }} wilt verwijderen?')"
                                            role="button" class="fa fa-trash float-right mr-5" aria-hidden="true">

                                        </button>

                                        <a href="{{ route('admin.trips.edit', $trip) }}">
                                            <i class="fa fa-pencil float-right mr-5" aria-hidden="true"></i>
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
