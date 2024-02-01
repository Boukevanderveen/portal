@extends('layouts.app')
@section('content')
<div>
    <button onclick="window.location='{{ url()->previous() }}'" type="button"
                    class="float-left focus:outline-none font-bold text-950 border border-gray-400 rounded-sm text-sm px-5 py-2 me-2 mb-2 ">
                    < Terug</button>
    <nav class="hidden lg:block flex px-5 py-2 text-gray-700 " aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
            <a href="{{ route('index')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                <p class="ml-1"> Home </p>
            </a>
            </li>
            <li class="inline-flex items-center">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <p class="ml-1"> > Projecten </p>
            </a>
            </li>
            <li class="inline-flex items-center">
            <a href="{{ route('projects.show', $projectpost->project) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <p class="ml-1"> > {{$projectpost->project->name}} </p>
            </a>
            </li>
            <li class="inline-flex items-center">
            <a href="{{ route('projects.projectposts.show', [$projectpost->project, $projectpost]) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <p class="ml-1"> > {{$projectpost->name}} </p>
            </a>
            </li>
        
        </ol>
    </nav>
</div>
<div class="grid grid-cols-5 grid-rows-2 gap-4">
<div class="lg:hidden col-span-5">
        <img class="" src="{{ asset('/images/projectposts/'. $projectpost->id .'/'. $projectpost->picture.'') }}">
    
    </div>
        <div class="hidden lg:block col-span-2">
        <img class="" src="{{ asset('/images/projectposts/'. $projectpost->id .'/'. $projectpost->picture.'') }}">
    
    </div>
    
    <div class="mb-5 mt-5 col-span-5 row-start-2">
    <span class="prose">{!!$projectpost->description!!}</span>
</div>
@endsection



    
