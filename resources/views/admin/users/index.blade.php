@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-1 gap-4">

        <div class="text-3xl col-start-1 col-span-1">
            Gebruikers
            <button onclick="window.location='{{ route('admin.users.create') }}'" type="button"
                class="float-right focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Nieuwe
                gebruiker</button>
        </div>

        <div class="max-w-full  overflow-hidden shadow-lg">
            <div class=" row-start-2 row-span-1 border overflow-x-auto">
                <table class="w-full text-sm text-left bg-[#3a5757]">
                    <thead class="text-xs  uppercase text-white ">
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
                                <td class="min-w-24">
                                    @if (Auth::User()->id !== $user->id)
                                        <form method="post" action="{{ route('admin.users.destroy', $user) }}"> @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Weet je zeker dat je {{ $user->name }} wilt verwijderen? Hiermee worden alle bestanden en de gebruiker zelf op Linux permanent verwijderd.')"
                                                role="button" class="fa fa-trash float-right mr-5" aria-hidden="true">

                                            </button>

                                     
                                        </form>
                                        

                                    @endif
                                    <a class="mt-5" href="{{ route('admin.users.edit', $user) }}">
                                                <i class="fa fa-pencil float-right mr-5" aria-hidden="true"></i>
                                            </a>


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
