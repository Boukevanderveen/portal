@extends("layouts.app")
@section("content")
<div class="grid grid-cols-3 grid-rows-1 gap-0 mt-5">
    <div class="col-start-2 max-w-sm bg-white border border-gray-200 rounded-lg m-3">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="p-5">
            <form method="POST" action="{{ route('login') }}">
                <span class="font-bold text-2xl col-start-1 col-span-1 mb-5 text-[#2f4443]">
                Log In
                </span>
                @csrf

                <!-- Email Address -->
                <div class="mt-5">
                    <x-input-label for="email" :value="__('E-mail')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Wachtwoord')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center mt-4">


                    <button class="focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 float-left">
                        {{ __('Inloggen') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection