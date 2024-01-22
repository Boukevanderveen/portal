@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4">
        <div class="text-3xl col-start-1 col-span-1">
            Projecten
        </div>

        @if($projects->isEmpty())
        <h1 class="text-1xl"> Nog niets op het programma </h1>
        @endif
        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach ($projects as $project)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                    <img style="width: 400px; height: 300px" src="{{ asset('/images/projects/'. $project->id .'/'. $project->picture.'') }}">
                    <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $project->name }}</h6>
                        <a target="_blank"
                            href="{{$project->link}}"
                            class="inline-flex items-center px-3 py-2 text-sm text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                            Meer informatie
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                     
                    </div>
                </div>
            @endforeach
        </div>     
    </div>
@endsection
