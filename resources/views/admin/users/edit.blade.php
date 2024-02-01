@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="col-span-5">
            <button onclick="window.location='{{ url()->previous() }}'" type="button"
                class="float-left focus:outline-none font-bold text-950 border border-gray-400 rounded-sm text-sm px-5 py-2 me-2 mb-2 ">
                < Terug</button>
                    <nav class="hidden lg:block flex px-5 py-2 text-gray-700 " aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="{{ route('index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg>
                                    <p class="ml-1"> Home </p>
                                </a>
                            </li>
                            <li class="inline-flex items-center">
                                <a href="{{ route('admin.index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Admin </p>
                                </a>
                            </li>
                            <li class="inline-flex items-center">
                                <a href="{{ route('admin.users.index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Gebruikers </p>
                                </a>
                            </li>
                            <li class="inline-flex items-center">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Bewerk gebruiker </p>
                                </a>
                            </li>
                        </ol>
                    </nav>
        </div>

        <div class="text-3xl col-start-1 col-span-5">
            Bewerk gebruiker
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" action="{{ route('admin.users.update', $user) }}">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-1 col-span-5 lg:col-start-2 lg:col-span-3">

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                <span id="name_label">Naam</span>
                            </label>
                            <input value="{{ old('name', $user->name) }}"
                                class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" id="name" type="text">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                E-mail
                            </label>
                            <input value="{{ old('email', $user->email) }}"
                                class="shadow appearance-none border @error('email') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="email" id="email" type="text">
                            @if ($errors->has('email'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="privileges">
                                Privileges
                            </label>
                            <select class="text-sm w-full p-2.5 rounded" id="privileges" name="privileges">
                                <option value="1"
                                    @if (old('privileges') !== null && old('privileges') == 1) selected @else @if (null == old('privileges') && $user->isStudent) selected @endif
                                    @endif >Student</option>
                                <option value="2"
                                    @if (old('privileges') !== null && old('privileges') == 2) selected @else @if (null == old('privileges') && $user->isAdmin) selected @endif
                                    @endif >Admin</option>
                            </select>
                        </div>
                        <div id="school_name_section" class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="school_year">
                                Schooljaar
                            </label>
                            <select class="text-sm w-full p-2.5 rounded" id="school_year" name="school_year">
                                <option value="1" @if (old('school_year') !== null && old('school_year') == 1) selected @endif>1</option>
                                <option value="2" @if (old('school_year') !== null && old('school_year') == 2) selected @endif>2</option>
                                <option value="3" @if (old('school_year') !== null && old('school_year') == 3) selected @endif>3</option>
                                <option value="4" @if (old('school_year') !== null && old('school_year') == 4) selected @endif>4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Wachtwoord
                            </label>
                            <input
                                class="shadow appearance-none border @error('password') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="password" id="password" type="password" placeholder="">
                            @if ($errors->has('password'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <button type="submit"
                            class="focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                            Bevestig</button>

                    </div>
                </div>

            </form>
        </div>
    </div>
    <script>
        //Controleerd elke 500ms of het rechtenveld is verranderd, en past daarna eventueel aan
        var school_name_section = document.getElementById('school_name_section');
        setInterval(function checkPrivilegesChange() {
            if (document.getElementById("privileges").value == 0) {
                document.getElementById('email').removeAttribute('readonly');
                document.getElementById("name_label").textContent = "Naam";
                school_name_section.classList.remove("hidden");
                school_name_section.classList.add("block");
            }
            if (document.getElementById("privileges").value == 1) {
                document.getElementById("email").readOnly = true;

                if (document.getElementById("name").value == "") {
                    document.getElementById("email").value = ""
                } else {
                    document.getElementById("email").value = document.getElementById("name").value +
                        "@edu.rocfriesepoort.nl";
                }
                document.getElementById("name_label").textContent = "Leerlingnummer";
                school_name_section.classList.remove("hidden");
                school_name_section.classList.add("block");


            }
            if (document.getElementById("privileges").value == 2) {
                document.getElementById('email').removeAttribute('readonly');
                document.getElementById("name_label").textContent = "Naam";
                school_name_section.classList.remove("block");
                school_name_section.classList.add("hidden");
            }
        }, 500);
    </script>
@endsection
