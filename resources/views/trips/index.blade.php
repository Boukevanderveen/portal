@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4">
        <div>
            <button onclick="window.location='{{ url()->previous() }}'" type="button"
                class="float-left focus:outline-none font-bold text-950 border border-gray-400 rounded-sm text-sm px-5 py-2 me-2 mb-2 ">
                < Terug</button>
                    <!-- Breadcrumb -->
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
                                <a href="{{ route('trips.index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Uitjes </p>
                                </a>
                            </li>

                        </ol>
                    </nav>
        </div>
        <div class="text-3xl col-start-1 col-span-1">
            Uitjes
        </div>

        <h1 class="text-2xl"> Leerjaar 1 </h1>
        @if ($trips1->isEmpty())
            <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach ($trips1 as $trip)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                    <img style="width: 400px; height: 300px"
                        src="{{ asset('/images/trips/' . $trip->id . '/' . $trip->picture . '') }}">

                    <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $trip->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ date('d-m-Y', strtotime($trip->date)) }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $trip->time }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Locatie: {{ $trip->location }}</p>
                        <i class="float-right fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="text-2xl"> Leerjaar 2 </h1>
        @if ($trips2->isEmpty())
            <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach ($trips2 as $trip)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                    <img style="e0px; height: 300px" src="{{ asset('/images/trips/' . $trip->id . '/' . $trip->picture . '') }}">

                    <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $trip->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ date('d-m-Y', strtotime($trip->date)) }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $trip->time }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Locatie: {{ $trip->location }}</p>
                        @if ($trip->link !== null)
                            <a class="float-right" target="_blank" href="{{ $trip->link }}">
                                <i class="fa fa-link" aria-hidden="true"></i>
                            </a>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="text-2xl"> Leerjaar 3 </h1>
        @if ($trips3->isEmpty())
            <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach ($trips3 as $trip)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                    <a href="#">
                        <img class="rounded-t-lg"
                            src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $trip->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ date('d-m-Y', strtotime($trip->date)) }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $trip->time }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Locatie: {{ $trip->location }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="text-2xl"> Leerjaar 4 </h1>
        @if ($trips4->isEmpty())
            <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach ($trips4 as $trip)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                    <a href="#">
                        <img class="rounded-t-lg"
                            src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $trip->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ date('d-m-Y', strtotime($trip->date)) }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $trip->time }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Locatie: {{ $trip->location }}</p>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
