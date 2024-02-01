@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">
    <div class="col-span-5">
    <button onclick="window.location='{{ url()->previous() }}'" type="button"
                    class="float-left focus:outline-none font-bold text-950 border border-gray-400 rounded-sm text-sm px-5 py-2 me-2 mb-2 ">
                    < Terug</button>
    <nav class="hidden lg:block flex px-5 py-2 text-gray-700 " aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
            <a href="{{ route('index')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                <p class="ml-1"> Home </p>
            </a>
            </li>
            <li class="inline-flex items-center">
            <a href="{{ route('admin.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <p class="ml-1"> > Admin </p>
            </a>
            </li>
            <li class="inline-flex items-center">
            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <p class="ml-1"> > Projecten </p>
            </a>
            </li>
            <li class="inline-flex items-center">
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <p class="ml-1"> > Nieuw project </p>
            </a>
            </li>
        </ol>
    </nav>
</div>
        <div class="text-3xl col-start-1 col-span-5">
            Nieuw project
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-1 col-span-5 lg:col-start-2 lg:col-span-3">
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Naam *
                            </label>
                            <input  
                            value="{{old('name')}}" class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" id="name" type="text">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="intro">
                                Intro *
                            </label>
                            <textarea rows="4"
                            class="shadow appearance-none border @error('intro') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="intro" id="intro" type="text">{{old('intro')}}</textarea>
                            @if ($errors->has('intro'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('intro') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Beschrijving *
                            </label>
                            <textarea name="description" id="editor">
                            {{old('description')}}
                            </textarea>
                            @if ($errors->has('description'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="highlighted">
                                Uitgelicht op home *
                            </label>
                            <select class="text-sm w-full p-2.5 rounded" id="highlighted" name="highlighted">
                                <option value="0" @if(old('highlighted') !== null && old('highlighted') == 0) selected @endif>Nee</option>
                                <option value="1" @if(old('highlighted') !== null && old('highlighted') == 1) selected @endif>Ja</option>
                            </select>
                            @if ($errors->has('highlighted'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('highlighted') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">
                                Afbeelding (max 1mb, min-breedte 910px) *
                            </label>
                            <input
                            value="{{old('picture')}}" class="shadow appearance-none border @error('picture') border-red-500 @enderror  mb-3 rounded w-full  text-sm leading-tight focus:outline-none focus:shadow-outline"
                                name="picture" id="picture" type="file">
                            @if ($errors->has('picture'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('picture') }}</p>
                            @endif
                        </div>
       
                        <button type="submit"
                            class="focus:outline-none font-bold text-950 bg-[#ffcd00] hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 rounded-sm text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                            Bevestig</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    
    <script>
      tinymce.init({
        selector: '#editor'
      });
    </script>
@endsection
