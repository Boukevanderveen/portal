@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-3">
            <button onclick="window.location='{{ url()->previous() }}'" type="button"
                class="float-left focus:outline-none font-bold text-950 border border-gray-400 rounded-sm text-sm px-5 py-2 me-2 mb-2 ">
                < Terug</button>
                    <!-- Breadcrumb -->
                    <nav class="hidden lg:block flex px-5 py-2 text-gray-700 " aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="#"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg>
                                    <p class="ml-1"> Home </p>
                                </a>
                            </li>

                        </ol>
                    </nav>
        </div>
        <div class=" col-span-4 lg:col-span-3">

            <div class="block lg:hidden"style=" width-100%; overflow: hidden">

                <img src="{{ asset('/firda.jpg') }}">

            </div>
            <div class="hidden lg:block"style=" width-100%; height: 400px; overflow: hidden">

            <img src="{{ asset('/firda.jpg') }}">

            </div>
        </div>
        <div class="col-span-4 lg:col-span-3">
            <div class="w-full text-3xl font-bold">
                Welkom op Mbo-Portal
            </div>
            <p class="mb-2 text-1xl font-bold tracking-tight text-gray-600">Op deze website vind je alle informatie binnen de opleiding Software Development op Firda. Hier tonen we onze projecten waar onze ontwikkelingsteams mee bezig (geweest) zijn. Voor studenten is het ook mogelijk om veel informatie te vinden over de studie. </p>
                @if (!$projects->isEmpty())
                <a href="#projects"
                                    class="mt-2 inline-flex items-center px-3 py-2 text-sm text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                    Bekijk onze werkzaamheden
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                @endif
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        </div>

        @if (!$tests->isEmpty())
            <div class="overflow-hidden col-span-4 lg:col-span-3">
                <div class="mt-3 col-span-3 text-3xl">
                    Eerstvolgende toetsen
                </div>
                <div class="overflow-x-auto row-span-1 mt-3 col-span-3">
                    <table style="width:900px;"class=" table-auto w-full text-sm text-left  shadow-lg border">

                        <tbody style="width: 900px;">
                            @foreach ($tests as $test)
                                <tr class="bg-white border-b ">
                                    <td class=" overflow-hidden px-6 py-4">
                                        {{ $test->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Start: {{ date('d-m-Y', strtotime($test->date)) }}
                                        {{ date('H:i', strtotime($test->time)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Periode {{ $test->period }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Herkansing: @if (isset($test->resit_date))
                                            {{ date('d-m-Y', strtotime($test->resit_date)) }}
                                            {{ date('H:i', strtotime($test->resit_time)) }}
                                        @else
                                            Nog geen
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if (!$projectweeks->isEmpty())
            <div class="col-span-4 lg:col-span-3">
                <div class="mt-3 col-span-3 text-3xl">
                    Komende projectweken
                </div>
                <div class="overflow-x-auto">
                    <table style="min-width:900px;" class="table-auto w-full w-full text-sm text-left bg-[#3a5757] shadow-lg border z-1">
                    <tbody>
                        @foreach ($projectweeks as $projectweek)
                            <tr class="bg-white border-b ">
                                <td class="px-6 py-4">
                                    {{ $projectweek->name }}
                                </td>
                                <td class="px-6 py-4">
                                    Periode {{ $projectweek->period }}
                                </td>
                                <td class="px-6 py-4">
                                    Week {{ $projectweek->week }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('d-m-Y', strtotime($projectweek->start_date)) }} -
                                    {{ date('d-m-Y', strtotime($projectweek->end_date)) }}
                                </td>
                                <td class="px-6 py-4">
                                    Doelgroep: {{ $projectweek->target_class }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        @endif

        @if (!$projects->isEmpty())
            <div id="projects" class="mb-6 col-span-4 lg:col-span-3">
                <div class="mt-3 text-3xl">
                    Uitgelichte projecten
                </div>
                <div class="mt-3">
                    @foreach ($projects as $project)
                        <div style="z-index:1" class="bg-white border border-gray-200 rounded-lg shadow ">
                            <div class="hidden lg:block"style="width-100%; height: 400px; overflow: hidden">
                                <img
                                    src="{{ asset('/images/projects/' . $project->id . '/' . $project->picture . '') }}">
                            </div>
                            <div class="block lg:hidden"style="width-100%">
                                <img
                                    src="{{ asset('/images/projects/' . $project->id . '/' . $project->picture . '') }}">
                            </div>
                            <div class="p-5">
                                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $project->name }}</p>
                                <p class="mb-2 text-1xl font-bold tracking-tight text-gray-600">{{ $project->intro }}
                                </p>

                                <a href="{{ URL::route('projects.show', $project) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                    Meer informatie
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <style>
        html{scroll-behavior:smooth}
    </style>
@endsection
