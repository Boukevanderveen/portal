@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-1 gap-4">
        <div class="text-3xl col-start-1 col-span-1">
            {{ $test->name }}
            <button data-modal-target="manage-modal" data-modal-toggle="manage-modal" type="button"
                class="float-right focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 ">Beheer inschrijvingen</button>
        </div>
        
        <div class="max-w-full  overflow-hidden shadow-lg">
            <div class="relative  row-start-2 row-span-1 border">
                <table class="w-full text-sm text-left bg-[#3a5757]">
                    <thead class="text-xs  uppercase text-white ">                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Naam
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr class="bg-white border-b ">
                                <td class="px-6 py-4">
                                    {{ $registration->user->name }}
                                </td>
                                <td>
                                        <form method="post" action="{{ route('admin.tests.registrations.destroy', [$test, $registration]) }}"> @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Weet je zeker dat je {{ $registration->user->name }} wilt verwijderen? Hiermee worden alle bestanden en de gebruiker zelf op Linux permanent verwijderd.')"
                                                role="button" class="fa fa-trash float-right mr-5" aria-hidden="true">

                                            </button>

                                         
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Main modal -->
        <div id="manage-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="manage-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900">Beheer inschrijvingen</h3>
                        <form class="space-y-6" method="POST" action="{{ route('admin.tests.registrations.store', $test) }}">
                        @csrf
                            <div>
                                <label for="user_ids"
                                    class="block mb-2 text-sm font-medium text-gray-900">Ingeschrevenen</label>
                                    <select name="user_ids[]" class="js-example-basic-multiple" style="width: 100%"  multiple="multiple">
                                        @foreach($registrations as $registration)
                                        <option selected value="{{$registration->user_id}}">{{$registration->user->name}}</option>
                                        @endforeach
                                        @foreach($users as $user)
                                        @if(!$registrations->contains('user_id', $user->id))
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                            </div>
                            <button type="submit"
                                class="w-full font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Bevestig</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endsection
