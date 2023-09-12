@extends('layouts.app')
@section('content')
<div class="grid grid-cols-1 gap-4">
    <div class="text-3xl col-start-1 col-span-1">
        Toetsen
    </div>
</div>
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
                                    {{ $test->date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $test->time }}
                                </td>
                                <td class="px-6 py-4">
                                    Periode {{ $test->period }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    </div>
@endsection
