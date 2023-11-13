@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">
            Bewerk gebruiker
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" action="{{ route('admin.users.update', $user) }}">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-2 col-span-3">

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                <span id="name_label">Naam</span>
                            </label>
                            <input
                            value="{{old('name', $user->name)}}" class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" id="name" type="text">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                E-mail
                            </label>
                            <input
                            value="{{old('email', $user->email)}}" class="shadow appearance-none border @error('email') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="email" id="email" type="text">
                            @if ($errors->has('email'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="privileges">
                                Privileges
                            </label>
                            <select class="appearance-none rounded w-full" id="privileges" name="privileges">
                                <option value="1" @if(old('privileges') !== null && old('privileges') == 1) selected @else @if(null == old('privileges') && $user->isStudent) selected @endif @endif >Student</option>
                                <option value="2" @if(old('privileges') !== null && old('privileges') == 2) selected @else @if(null == old('privileges') && $user->isAdmin) selected @endif @endif >Admin</option>
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
                            class="float-left text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Bevestig</button>
                       
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <script>
        setInterval(function() {
            if(document.getElementById("privileges").value == 0){
                document.getElementById('email').removeAttribute('readonly');
                document.getElementById("name_label").textContent = "Naam"
            }
            if(document.getElementById("privileges").value == 1){
                document.getElementById("email").readOnly = true;
    
                if(document.getElementById("name").value == ""){
                document.getElementById("email").value = ""
                }
                else{
                    document.getElementById("email").value = document.getElementById("name").value +
                    "@edu.rocfriesepoort.nl";
                }
                document.getElementById("name_label").textContent = "Leerlingnummer"
    
            }
            if(document.getElementById("privileges").value == 2){
                document.getElementById('email').removeAttribute('readonly');
                document.getElementById("name_label").textContent = "Naam"
    
            }
        }, 500);
    </script>
@endsection
