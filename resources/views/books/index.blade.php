@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 gap-4">
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
                                <a href="{{ route('books.index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Boeken </p>
                                </a>
                            </li>

                        </ol>
                    </nav>
        </div>

        <div class="text-3xl col-start-1 col-span-1">
            Boeken
        </div>

        <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
            @foreach ($books as $book)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow =">
                    <a href="#">
                        <img class="rounded-t-lg"
                            src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $book->name }}</h6>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">ISBN: {{ $book->ISBN }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">Leerjaar {{ $book->school_year }}</p>
                        <p class="mb-1 text-gray-500 dark:text-gray-400">€ {{ str_replace('.', ',', $book->price) }}</p>
                        @if ($book->link !== null)
                            <a class="float-right" target="_blank" href="{{ $book->link }}">
                                <i class="fa fa-link" aria-hidden="true"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
