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
        <div class="grid grid-cols-1 gap-4 ">
            <div class="max-w-full  overflow-hidden ">
                <div class="row-start-2 row-span-1 ">
                    <div class="hidden lg:block">
                        <table class="w-full text-sm text-left bg-[#3a5757] shadow-lg border">
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


                    @foreach ($tests as $test)
                        <div class="block lg:hidden">
                            <div class="grid grid-cols-6 grid-rows-1 gap-4 ">
                                <div class="col-span-4 text-2xl ">
                                    {{ $test->name }}
                                </div>
                                <div class="col-span-2">

                                    @if ($test->registerable)
                                        @auth
                                            @if (\App\Models\Test_User::where(['user_id' => auth()->user()->id, 'test_id' => $test->id])->exists())
                                                <form method="post"
                                                    action="{{ route('tests.registrations.destroy', $test) }}"> @csrf
                                                    @method('delete')
                                                    <button
                                                        class="float-right text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> Uitschrijven</button>
                                                </form>
                                            @else
                                                <form method="post" action="{{ route('tests.registrations.store', $test) }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="float-right text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> Inschrijven</button>
                                                </form>
                                            @endif
                                        @endauth
                                        @guest
                                            <div class="float-right">
                                                Log in voor <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </div>
                                        @endguest
                                    @endif


                                </div>
                            </div>
                            <table class="mt-2 w-full text-sm text-left bg-[#3a5757]">
                                <thead class="text-xs  uppercase text-white ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Start
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Periode
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Herkansing
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b ">

                                        <td class="px-6 py-4">
                                            {{ date('d-m-Y', strtotime($test->date)) }}
                                            {{ date('H:i', strtotime($test->time)) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $test->period }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if (isset($test->resit_date))
                                                {{ date('d-m-Y', strtotime($test->resit_date)) }}
                                                {{ date('H:i', strtotime($test->resit_time)) }}
                                            @else
                                                Nog geen
                                            @endif
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
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
                    <div class="hidden lg:block">
                        <table class="w-full text-sm text-left bg-[#3a5757] shadow-lg border z-1">

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
                    <div class="block lg:hidden">
                        <div class="grid grid-cols-6 grid-rows-1 gap-4 ">
                            <div class="col-span-4 text-2xl">
                                {{ $projectweek->name }}
                            </div>
                            <div class="col-span-2">

                                @if ($projectweek->registerable)
                                    @auth
                                        @if (
                                            \App\Models\Projectweek_User::where([
                                                'user_id' => auth()->user()->id,
                                                'projectweek_id' => $projectweek->id,
                                            ])->exists())
                                            <form method="post"
                                                action="{{ route('projectweeks.registrations.destroy', $projectweek) }}"> @csrf
                                                @method('delete')
                                                <button
                                                    class="float-right text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Uitschrijven</button>
                                            </form>
                                        @else
                                            <form method="post"
                                                action="{{ route('projectweeks.registrations.store', $projectweek) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="float-right text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Inschrijven</button>
                                            </form>
                                        @endif
                                    @endauth
                                    @guest
                                        <div class="float-right">
                                            Log in voor <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </div>
                                    @endguest
                                @endif


                            </div>
                        </div>
                        <table class="mt-2 w-full text-sm text-left bg-[#3a5757]">
                            <thead class="text-xs  uppercase text-white ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Periode
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Week
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Datum
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Doelgroep
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projectweeks as $projectweek)
                                    <tr class="bg-white border-b ">
                                        <td class="px-6 py-4">
                                            {{ $projectweek->period }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $projectweek->week }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ date('d-m-Y', strtotime($projectweek->start_date)) }} -
                                            {{ date('d-m-Y', strtotime($projectweek->end_date)) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $projectweek->target_class }}
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
