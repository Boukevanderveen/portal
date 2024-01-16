@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">
            Nieuw project
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-2 col-span-3">
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
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="link">
                                Link *
                            </label>
                            <input
                            value="{{old('link')}}" class="shadow appearance-none border @error('link') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="link" id="link" type="text">
                            @if ($errors->has('link'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('link') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">
                                Afbeelding
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
@endsection
