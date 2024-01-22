@extends('layouts.app')
@section('content')

    <div class="grid grid-cols-3 grid-rows-1 gap-4 ">
        <div class="col-span-2 text-2xl">
        Keuzedeel {{$elective->name}}

        </div>
        <div class="col-start-3">
        <button onclick="window.location='{{ route('electives.index') }}'" type="button"
                    class="float-right focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                    < Terug</button>
        </div>
    </div>

    <span class="text-base mb-1 ">Docent: {{ $elective->teacher }}</span>
    <span class="text-base mb-1 ">Periode: {{$elective->period}}</span>
    <span class="text-base mb-1 ">Code: {{$elective->code}}</span>
    <span class="text-base mb-1 ">Code: {{$elective->description}}</span>

@endsection
