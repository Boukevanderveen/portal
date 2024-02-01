@extends('layouts.app')
@section('content')
<div class="col-span-5">

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
                    <a href="{{ route('projects.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <p class="ml-1"> > Projecten </p>
                    </a>
                </li>
                <li class="inline-flex items-center">
                <a href="{{ route('projects.subprojects.show', [$subproject->project, $subproject]) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <p class="ml-1"> > {{$subproject->name}} </p>
                </a>
                </li>

            </ol>
        </nav>

</div>


<div class="mb-5 grid grid-cols-3 gap-4">
    <div class="lg:hidden col-span-3">
        <img class="" src="{{ asset('/images/subprojects/'. $subproject->id .'/'. $subproject->picture.'') }}">
    
    </div>
        <div class="hidden lg:block col-span-2">
        <img class="" src="{{ asset('/images/subprojects/'. $subproject->id .'/'. $subproject->picture.'') }}">
    
    </div>
    <div class="col-span-5 row-start-2">
    <span class="prose">{!!$subproject->description!!}</span>
    @if(!$subproject->users->isEmpty())
    <div class="mt-2 grid grid-cols-3 lg:grid-cols-1 gap-4">
        <div class="text-3xl col-span-3">
            Ontwikkelaars
</div>
        @foreach($subproject->users as $user)
            <div class="col-span-3 lg:col-span-1 max-w-sm bg-white border border-gray-200 rounded-lg shadow =">

                <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$user->name}}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{$user->email}}</p>
                        <a 
                                href="{{ URL::route('users.show', [$user]); }}" 
                                class="inline-flex items-center px-3 py-2 text-sm text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                Bekijk profiel
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
    @endif
</div>
@endsection



    
