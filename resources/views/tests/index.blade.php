@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4 text-3xl">
        <div class="col-start-1 col-span-1">
            Toetsen
            @if ($currentyear)
                <button onclick="window.location='{{ route('tests.lastyear') }}'"
                    class="float-right text-sm bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                    < Vorig jaar </button>
                    @else
                        <button onclick="window.location='{{ route('tests.index') }}'"
                            class="float-right text-sm bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
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
                    <table class="w-full text-sm text-left ">

                        <tbody>
                            @foreach ($tests as $test)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4">
                                        {{ $test->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Start: {{ $test->date }} {{ date('H:i', strtotime($test->time)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Periode {{ $test->period }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Herkansing: @if (isset($test->resit_date))
                                            {{ $test->resit_date }} {{ date('H:i', strtotime($test->resit_time)) }}
                                        @else
                                            Nog geen
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($test->registerable)
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
