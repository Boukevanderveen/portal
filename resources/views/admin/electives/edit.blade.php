@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">
            Bewerk keuzedeel
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" action="{{ route('admin.electives.update', $elective) }}">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-2 col-span-3">
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Naam *
                            </label>
                            <input
                            value="{{old('name', $elective->name)}}" class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" id="name" type="text">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Beschrijving *
                            </label>
                            <textarea rows="4"
                            class="shadow appearance-none border @error('description') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="description" id="description" >{{old('description', $elective->description)}}</textarea>
                            @if ($errors->has('description'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="hours">
                                Uren *
                            </label>
                            <input
                            value="{{old('hours', $elective->hours)}}" class="shadow appearance-none border @error('hours') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="hours" id="hours" type="number">
                            @if ($errors->has('hours'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('hours') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="teacher">
                                Docent *
                            </label>
                            <input
                            value="{{old('teacher', $elective->teacher)}}" class="shadow appearance-none border @error('teacher') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="teacher" id="teacher" type="text">
                            @if ($errors->has('teacher'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('teacher') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="period">
                                Periode *
                            </label>
                            <input
                            value="{{old('period', $elective->period)}}" class="shadow appearance-none border @error('period') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="period" id="period" type="text">
                            @if ($errors->has('period'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('period') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="code">
                                Code
                            </label>
                            <input
                            value="{{old('code', $elective->code)}}" class="shadow appearance-none border @error('code') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="code" id="code" type="number">
                            @if ($errors->has('code'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('code') }}</p>
                            @endif
                        </div>

                        <button type="submit"
                            class="float-left text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600">
                            Bevestig</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection
