@extends('layouts.app')
@section('content')
<div class="grid grid-cols-1 gap-4">
        <div class="text-3xl col-start-1 col-span-1">
            @auth
            Welkom, {{Auth::User()->name;}}
            @endauth
            @guest
            Je bent niet ingelogd
            @endguest
        </div>
    </div>
@endsection
