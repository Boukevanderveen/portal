@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4 text-3xl">
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
        <div class="grid grid-cols-1 gap-4 mt-3">
            <div class="max-w-full  overflow-hidden shadow-lg">
                <div class="relative  row-start-2 row-span-1 border">
                    <table class="w-full text-sm text-left bg-[#3a5757]">

                        <tbody>
                            @foreach ($tests as $test)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4">
                                        {{ $test->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Start: {{ date('d-m-Y', strtotime($test->date)); }} {{ date('H:i', strtotime($test->time)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Periode {{ $test->period }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Herkansing: @if (isset($test->resit_date))
                                        {{ date('d-m-Y', strtotime($test->resit_date)); }} {{ date('H:i', strtotime($test->resit_time)) }}
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
    @endif
    <div class=" mt-5 grid grid-cols-1 gap-4 text-3xl">
        <div class="col-start-1 col-span-1">
            Project weken
        </div>
    </div>
    @if ($projectweeks->isEmpty())
        <h3 > Nog geen project weken </h3>
    @else
        <div class="grid grid-cols-1 gap-4 mt-3">
            <div class="max-w-full  overflow-hidden shadow-lg">
                <div class="relative  row-start-2 row-span-1 border">
                    <table class="w-full text-sm text-left bg-[#3a5757]">

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
                                    {{ date('d-m-Y', strtotime($projectweek->start_date)); }} - {{ date('d-m-Y', strtotime($projectweek->end_date)); }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Doelgroep: {{ $projectweek->target_class }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($projectweek->registerable)
                                        @auth
                                            @if (\App\Models\Projectweek_User::where(['user_id' => auth()->user()->id, 'projectweek_id' => $projectweek->id])->exists())
                                                <form method="post"
                                                    action="{{ route('projectweeks.registrations.destroy', $projectweek) }}"> @csrf
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
                                                    <button href="{{ route('projectweeks.registrations.store', $projectweek) }}"
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
