@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">
            Bewerk toets
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" action="{{ route('admin.tests.update', $test) }}">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-1 col-span-5 lg:col-start-2 lg:col-span-3">


                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Naam *
                            </label>
                            <input
                            value="{{old('name', $test->name)}}" class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" id="name" type="text">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="school_year">
                                Schooljaar *
                            </label>
                            <input
                            value="{{old('school_year', $test->school_year)}}" class="shadow appearance-none border @error('school_year') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="school_year" id="school_year" type="number">
                            @if ($errors->has('school_year'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('school_year') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="period">
                                Periode *
                            </label>
                            <input
                            value="{{old('period', $test->period)}}" class="shadow appearance-none border @error('period') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="period" id="period" type="text">
                            @if ($errors->has('period'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('period') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
                                Datum *
                            </label>
                            <input
                            value="{{old('date', $test->date)}}" class="shadow appearance-none border @error('date') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="date" id="date" type="date">
                            @if ($errors->has('date'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('date') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="time">
                                Tijd *
                            </label>
                            <input
                            value="{{old('time', $test->time)}}" class="shadow appearance-none border @error('time') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="time" id="time" type="time">
                            @if ($errors->has('time'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('time') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="resit_date">
                                Datum herkansing
                            </label>
                            <input
                            value="{{old('resit_date', $test->resit_date)}}" class="shadow appearance-none border @error('resit_date') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="resit_date" id="resit_date" type="date">
                            @if ($errors->has('resit_date'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('resit_date') }}</p>
                            @endif
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="resit_time">
                                Tijd herkansing
                            </label>
                            <input
                            value="{{old('resit_time', $test->resit_time)}}" class="shadow appearance-none border @error('resit_time') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="resit_time" id="resit_time" type="time">
                            @if ($errors->has('resit_time'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('resit_time') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="registerable">
                                Inschrijfbaar *
                            </label>
                            <select class="text-sm w-full p-2.5 rounded" id="registerable" name="registerable">
                                <option value="0" @if(old('registerable') !== null && old('registerable') == 0) selected @else @if(!$test->registerable) selected @endif @endif>Niet inschrijfbaar</option>
                                <option value="1" @if(old('registerable') !== null && old('registerable') == 1) selected @else @if(null == old('registerable') && $test->registerable) selected @endif @endif >Inschrijfbaar</option>
                            </select>
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
