@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-1 gap-4">

        <div class="text-3xl col-start-1 col-span-1">
            Websites
            <button onclick="window.location='{{ route('admin.websites.create') }}'" type="button"
                class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nieuwe
                website</button>
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
                                Leerling
                            </th>  
                            <th scope="col" class="px-6 py-3">
                                Aangemaakt op:
                            </th>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($websites as $website)
                            <tr class="bg-white border-b ">
                                <td class="px-6 py-4">
                                    {{ $website->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $website->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $website->created_at->format('d-m-Y')}}
                                </td>
                                <td>
                                    <form method="post" action="{{ route('admin.websites.destroy', $website) }}"> @csrf
                                        @method('delete')
                                        <button type="submit"
                                            onclick="return confirm('Weet je zeker dat je deze website wilt verwijderen?')"
                                            role="button" class="fa fa-trash float-right mr-5" aria-hidden="true">

                                        </button>

                                        <a href="{{ route('admin.websites.edit', $website) }}">
                                            <i class="fa fa-pencil float-right mr-5" aria-hidden="true"></i>
                                        </a>

                                        <a target="_blank" href="http://localhost/portal_websites/{{$website->user_id}}/{{$website->folder_name}}">
                                            <i class="fa-solid fa-globe float-right mr-5" aria-hidden="true"></i>
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
