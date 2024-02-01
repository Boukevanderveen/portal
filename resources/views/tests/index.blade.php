@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4 text-3xl">
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
                                <a href="{{ route('tests.index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Toetsen </p>
                                </a>
                            </li>

                        </ol>
                    </nav>
        </div>
        <div class="col-start-1 col-span-1">
            Toetsen
            @if ($currentyear)
                <button onclick="window.location='{{ route('tests.lastyear') }}'"
                    class="float-right focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                    < Vorig jaar </button>
                    @else
                        <button onclick="window.location='{{ route('tests.index') }}'"
                            class="float-right focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                            > Huidig jaar
                        </button>
            @endif
        </div>
    </div>
    @if ($tests->isEmpty())
        <h3> Nog geen toetsen </h3>
    @else
        <div class="grid grid-cols-1 gap-4 ">
            <div class="max-w-full  overflow-hidden ">
                <div class="row-start-2 row-span-1 ">
                    <div class="overflow-x-auto overflow-hidden lg:block">
                        <table style="min-width:900px;" class="w-full text-sm text-left bg-[#3a5757] shadow-lg border">
                            <tbody>
                                @foreach ($tests as $test)
                                    <tr class="bg-white border-b ">
                                        <td class="px-6 py-4">
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
                                        <td class="px-6 py-4">
                                            @if ($test->registerable)
                                                @auth
                                                    @if (\App\Models\Test_User::where(['user_id' => auth()->user()->id, 'test_id' => $test->id])->exists())
                                                        <form method="post"
                                                            action="{{ route('tests.registrations.destroy', $test) }}"> @csrf
                                                            @method('delete')
                                                            <button
                                                                class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-0 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                                                Uitschrijven
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form method="post"
                                                            action="{{ route('tests.registrations.store', $test) }}">
                                                            @csrf
                                                            <button href="{{ route('tests.registrations.store', $test) }}"
                                                                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-0 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Inschrijven
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endauth
                                                @guest
                                                    Log in om in te schrijven
                                                @endguest
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>


        </div>
    @endif
    <div class=" mt-7 grid grid-cols-1 gap-4 text-3xl">
        <div class="col-start-1 col-span-1">
            Project weken
        </div>
    </div>
    @if ($projectweeks->isEmpty())
        <h3 class="mt-7"> Nog geen project weken </h3>
    @else
        <div class="grid grid-cols-1 gap-4 mt-4">
            <div class="max-w-full  overflow-hidden">
                <div class="row-start-2 row-span-1">
                    <div class="overflow-x-auto">
                        <table style="min-width:900px;" class="w-full text-sm text-left bg-[#3a5757] shadow-lg border z-1">

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
                                        <td class="px-6 py-4">
                                            @if ($projectweek->registerable)
                                                @auth
                                                    @if (
                                                        \App\Models\Projectweek_User::where([
                                                            'user_id' => auth()->user()->id,
                                                            'projectweek_id' => $projectweek->id,
                                                        ])->exists())
                                                        <form method="post"
                                                            action="{{ route('projectweeks.registrations.destroy', $projectweek) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-0 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                                                Uitschrijven
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form method="post"
                                                            action="{{ route('projectweeks.registrations.store', $projectweek) }}">
                                                            @csrf
                                                            <button
                                                                href="{{ route('projectweeks.registrations.store', $projectweek) }}"
                                                                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-0 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Inschrijven
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endauth
                                                @guest
                                                    Log in om in te schrijven
                                                @endguest
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    @endif
@endsection
