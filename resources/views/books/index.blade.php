@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4">
        <div class="text-3xl col-start-1 col-span-1">
            Boeken
        </div>

        <div class="grid grid-cols-3 gap-4">
            @foreach($books as $book)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                <a href="#">
                    <img class="rounded-t-lg"
                        src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                        alt="" />
                </a>
                <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $book->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">ISBN: {{ $book->ISBN }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Leerjaar {{$book->school_year}}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">€ {{ str_replace('.', ',', $book->price) }}</p>
                </div>
            </div>            @endforeach
        </div>

       
    </div>
@endsection
