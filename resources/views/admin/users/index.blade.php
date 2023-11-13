@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-1 gap-4">

        <div class="text-3xl col-start-1 col-span-1">
            Gebruikers
            <button onclick="window.location='{{ route('admin.users.create') }}'" type="button"
                class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nieuwe
                gebruiker</button>
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
                                E-mail
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rechten
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gemaakt op:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white border-b ">
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    @if (!$user->isStudent && !$user->isAdmin)
                                        Gebruiker
                                    @endif
                                    @if ($user->isStudent)
                                        Student
                                    @endif
                                    @if ($user->isAdmin)
                                        Admin
                                    @endif

                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->created_at->format('d-m-Y') }}
                                </td>
                                <td>
                                    @if (Auth::User()->id !== $user->id)
                                        <form method="post" action="{{ route('admin.users.destroy', $user) }}"> @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Weet je zeker dat je {{ $user->name }} wilt verwijderen? Hiermee worden alle bestanden en de gebruiker zelf op Linux permanent verwijderd.')"
                                                role="button" class="fa fa-trash float-right mr-5" aria-hidden="true">

                                            </button>

                                            <a href="{{ route('admin.users.edit', $user) }}">
                                                <i class="fa fa-pencil float-right mr-5" aria-hidden="true"></i>
                                            </a>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    {{ $users->links() }}
@endsection
