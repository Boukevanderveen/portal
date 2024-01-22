@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4">
        <div class="text-3xl col-start-1 col-span-1">
            Uitjes
        </div>

        <h1 class="text-2xl"> Leerjaar 1 </h1>
        @if($trips1->isEmpty())
        <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach($trips1 as $trip)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                <a href="#">
                    <img class="rounded-t-lg"
                        src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                        alt="" />
                </a>
                <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $trip->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ date('d-m-Y', strtotime($trip->date))}}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $trip->time }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Locatie: {{ $trip->location }}</p>
                </div>
            </div>            
            @endforeach
        </div>

        <h1 class="text-2xl"> Leerjaar 2 </h1>
        @if($trips2->isEmpty())
        <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach($trips2 as $trip)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                <a href="#">
                    <img class="rounded-t-lg"
                        src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                        alt="" />
                </a>
                <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $trip->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ date('d-m-Y', strtotime($trip->date))}}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $trip->time }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Locatie: {{ $trip->location }}</p>
                </div>
            </div>            
            @endforeach
        </div>

        <h1 class="text-2xl"> Leerjaar 3 </h1>
        @if($trips3->isEmpty())
        <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach($trips3 as $trip)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                <a href="#">
                    <img class="rounded-t-lg"
                        src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                        alt="" />
                </a>
                <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $trip->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ date('d-m-Y', strtotime($trip->date))}}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $trip->time }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Locatie: {{ $trip->location }}</p>
                </div>
            </div>            
            @endforeach
        </div>

        <h1 class="text-2xl"> Leerjaar 4 </h1>
        @if($trips4->isEmpty())
        <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach($trips4 as $trip)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                <a href="#">
                    <img class="rounded-t-lg"
                        src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                        alt="" />
                </a>
                <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $trip->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ date('d-m-Y', strtotime($trip->date))}}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $trip->time }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Locatie: {{ $trip->location }}</p>
                </div>
            </div>            
            @endforeach
        </div>

       
    </div>
@endsection
