@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">
            Bewerk project week
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" action="{{ route('admin.projectweeks.update', $projectweek) }}">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-2 col-span-3">
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Naam *
                            </label>
                            <input
                            value="{{old('name', $projectweek->name)}}" class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" id="name" type="text">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                            @endif
                        </div>            

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="period">
                                Periode *
                            </label>
                            <input
                            value="{{old('period', $projectweek->period)}}" class="shadow appearance-none border @error('period') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="period" id="period" type="text">
                            @if ($errors->has('period'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('period') }}</p>
                            @endif
                        </div>        

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="week">
                                Week *
                            </label>
                            <input
                            value="{{old('week', $projectweek->week)}}" class="shadow appearance-none border @error('week') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="week" id="week" type="text">
                            @if ($errors->has('week'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('week') }}</p>
                            @endif
                        </div>        

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="start_date">
                                Start-datum *
                            </label>
                            <input
                            value="{{old('start_date', $projectweek->start_date )}}" class="shadow appearance-none border @error('start_date') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="start_date" id="start_date" type="date">
                            @if ($errors->has('start_date'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('start_date') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">
                                Eind-datum *
                            </label>
                            <input
                            value="{{old('end_date', $projectweek->end_date )}}" class="shadow appearance-none border @error('end_date') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="end_date" id="end_date" type="date">
                            @if ($errors->has('end_date'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('end_date') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="target_class">
                                Doelgroep *
                            </label>
                            <input
                            value="{{old('target_class', $projectweek->target_class )}}" class="shadow appearance-none border @error('target_class') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="target_class" id="target_class" type="text">
                            @if ($errors->has('target_class'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('target_class') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="registerable">
                                Inschrijfbaar *
                            </label>
                            <select class="appearance-none rounded w-full" id="registerable" name="registerable">
                                <option value="0" @if(old('registerable') !== null && old('registerable') == 0) selected @else @if(!$projectweek->registerable) selected @endif @endif>Niet inschrijfbaar</option>
                                <option value="1" @if(old('registerable') !== null && old('registerable') == 1) selected @else @if(null == old('registerable') && $projectweek->registerable) selected @endif @endif >Inschrijfbaar</option>
                            </select>
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
