@extends('layouts.app')
@section('content')
        <div class="text-3xl col-start-1 col-span-1">
            Keuzedelen
        </div>
            @php $firstLoop = true @endphp
            @foreach($electives as $elective)
            
            <div class="@if(!$firstLoop) mb-4 @endif  max-w bg-white border border-gray-200 rounded-lg shadow =">
                <div class="p-5">
                        <b class=" text-2xl font-bold tracking-tight text-gray-900">{{ $elective->name }}</b>
                        <h6><b >{{ $elective->hours }} uur</b><h6>
                        <h6><b >{{ $elective->teacher }}</b><h6>
                        <h6><b >Periode {{ $elective->period }}</p><h6>
                        <h6><b >Code: {{ $elective->code }}</b><h6>
                        <h6 class="text-gray-500 dark:text-gray-400"> {{ $elective->description }}<h6>
                </div>
            </div>    
            @php $firstLoop = false @endphp
            @endforeach

       
@endsection
