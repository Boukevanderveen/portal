@extends('layouts.app')
@section('content')
        <div class="text-3xl col-start-1 col-span-1">
            Keuzedelen
        </div>
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach($electives as $elective)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                <a href="#">
                    <img class="rounded-t-lg"
                        src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                        alt="" />
                </a>
                <div role="button" class="p-5" onclick="location.href='{{ URL::route('electives.show', $elective); }}';" >
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $elective->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Docent: {{ $elective->teacher }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Periode: {{$elective->period}}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Code: {{$elective->code}}</p>
                </div>
            </div>            @endforeach
        </div>

       
@endsection
