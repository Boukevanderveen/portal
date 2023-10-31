@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4">
        <div class="text-3xl col-start-1 col-span-1">
            Mijn websites   
        </div>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($websites as $website)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                    <a href="#">
                        <img class="rounded-t-lg"
                            src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $website->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">{{ $website->created_at->format('d-m-Y')}}</p>
                        <a target="_blank"
                            href="http://localhost/portal_websites/{{ $website->user_id }}/{{ $website->folder_name }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Bezoeken
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="{{ route('mywebsites.edit', $website) }}"class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            Bewerk
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
