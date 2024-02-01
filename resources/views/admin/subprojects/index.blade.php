@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-1 gap-4">

        <div>
            <button onclick="window.location='{{ url()->previous() }}'" type="button"
                class="float-left focus:outline-none font-bold text-950 border border-gray-400 rounded-sm text-sm px-5 py-2 me-2 mb-2 ">
                < Terug</button>
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
                                <a href="{{ route('admin.index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Admin </p>
                                </a>
                            </li>
                            <li class="inline-flex items-center">
                                <a href="{{ route('admin.subprojects.index') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <p class="ml-1"> > Subprojecten </p>
                                </a>
                            </li>
                            </li>
                        </ol>
                    </nav>
        </div>

        <div class="text-3xl col-start-1 col-span-1">
            <div class="grid grid-cols-6 grid-rows-1 gap-4">
                <div class="col-span-3">
                    <div>
                        Subprojecten
                    </div>
                </div>



                <div class="col-span-3">
                    <button onclick="window.location='{{ route('admin.subprojects.create') }}'" type="button"
                        class="float-right focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-2 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Nieuw
                        subproject</button>
                </div>

                <div class="col-span-6 lg:col-span-3">
                    <form id="searchForm" action="{{ route('admin.subprojects.search') }}">
                        @csrf
                        <div class="flex">

                            <div class="relative w-full">
                                <input placeholder="&#xF002; Zoeken op naam" style="font-family:Arial, FontAwesome"
                                    @isset($search_term) value="{{ $search_term }}" @endisset type="search"
                                    name="search_term" id="searchBar"
                                    class="w-full block p-2.5 w-80 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500">

                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-span-6 lg:col-span-3">
                    <form method="post" id="filterForm" action="{{ route('admin.subprojects.filter') }}">
                        @csrf

                        <select class="float-right w-full" id="project_select" onchange="this.form.submit()"
                            name="project_filter">
                            <option value="0">Alles </option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>

                    </form>

                </div>

            </div>

            <div class="mt-3 max-w-full  overflow-hidden shadow-lg">
                <div class=" row-start-2 row-span-1 border overflow-x-auto">
                    <table class="w-full text-sm text-left bg-[#3a5757]">
                        <thead class="text-xs  uppercase text-white ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Naam
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Project
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gemaakt op:
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subprojects as $subproject)
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4">
                                        {{ $subproject->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $subproject->project->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $subproject->created_at->format('d-m-Y') }}
                                    </td>

                                    <td class="min-w-28">
                                        <form method="post"
                                            action="{{ route('admin.subprojects.destroy', $subproject) }}"> @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Weet je zeker dat je {{ $subproject->name }} wilt verwijderen?')"
                                                role="button" class="fa fa-trash float-right mr-5" aria-hidden="true">

                                            </button>

                                            <a href="{{ route('admin.subprojects.edit', $subproject) }}">
                                                <i class="fa fa-pencil float-right mr-5" aria-hidden="true"></i>
                                            </a>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $subprojects->links() }}
    @isset($project_filter)
        <script>
            //Geeft old value aan de select
            var selectedProject = <?php echo $project_filter; ?>;
            document.getElementById('project_select').value = selectedProject;
        </script>
    @endisset
@endsection
