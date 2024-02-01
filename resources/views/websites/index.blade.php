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
                                <a href="{{ route('websites.index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Websites </p>
                                </a>
                            </li>

                        </ol>
                    </nav>
        </div>
        <div class="grid grid-cols-8 gap-4">

            <div class="text-3xl col-span-5">
                <span class="bg-lightBlue-300 "> Websites</span>
            </div>



            <div class="col-span-1">
                <form method="post" id="filterForm" action="{{ route('websites.filter') }}">
                    @csrf
                    <div class="flex">


                        <select id="school_year_select" onchange="this.form.submit()" name="school_year_filter">
                            <option value="0">Alles</option>
                            <option value="1">Leerjaar: 1</option>
                            <option value="2">Leerjaar: 2</option>
                            <option value="3">Leerjaar: 3</option>
                            <option value="4">Leerjaar: 4</option>
                        </select>

                    </div>
            </div>
            </form>
        </div>

        <div class="text-3xl col-span-1">
            @auth
                <button onclick="window.location='{{ route('websites.create') }}'" type="button"
                    class="float-right focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Nieuwe
                    website</button>
            @endauth
        </div>
    </div>
    @if ($websites->isEmpty())
        Nog geen websites
    @endif
    <div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm: alg-cols-1">
        @foreach ($websites as $website)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg">
                <a href="#">
                    <img class="rounded-t-lg"
                        src="http://uplod.wikimedia.org/wikipedia/en/thumb/c/cb/SC_Cambuur_logo.svg/800px-SC_Cambuur_logo.svg.png"
                        alt="" />
                </a>
                <div class="p-5">
                    <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $website->name }}</h6>

                    <p class="mb-1 text-gray-500">Door: {{ $website->user->name }}</p>
                    <p class="mb-1 text-gray-500">{{ $website->created_at->format('d-m-Y') }}</p>


                    <a target="_blank" href="{{ $website->link }}"
                        class="inline-flex items-center px-3 py-2 text-sm text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                        Bezoeken
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>

                </div>
            </div>
        @endforeach
    </div>

    </div>
    @isset($school_year_filter)
        <script>
            //Geeft old value aan de select
            var selectedSchoolYear = <?php echo $school_year_filter; ?>;
            document.getElementById('school_year_select').value = selectedSchoolYear;
        </script>
    @endisset
@endsection
