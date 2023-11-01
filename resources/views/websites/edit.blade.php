@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">

            
            Bewerk website

            <form method="post" action="{{ route('mywebsites.destroy', $website) }}"> @csrf

                @method('delete')
                
                <button role="button" type="submit"
                onclick="return confirm('Weet je zeker dat je deze website wilt verwijderen?')"
                    class="float-right text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Verwijderen</button>
                </form>



        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" onsubmit="doSubmit()" action="{{ route('mywebsites.update', $website) }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-2 col-span-3">
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Naam *
                            </label>
                            <input
                            value="{{old('name', $website->name)}}" class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" id="name" type="text">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Beschrijving
                            </label>
                            <textarea rows="4"
                            class="shadow appearance-none border @error('description') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="description" id="description" >{{old('description', $website->description)}}</textarea>
                            @if ($errors->has('description'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="student_id">
                                Leerling *
                            </label>
                            <select class="appearance-none rounded w-full @error('student_id') border-red-500 @enderror " id="student_id" name="student_id">
                                @foreach($students as $student)
                                <option value="{{$student->id}}" @if($website->user_id == $student->id) @endif @if(old('student_id') !== null && old('student_id') == $student->id) selected @endif>{{$student->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('student_id'))
                            <p class="text-red-500 text-xs italic">{{ $errors->first('student_id') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                                Project folder
                            </label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 @error('file') border-red-500 @enderror" name="file" type="file">
                            @if ($errors->has('file'))
                            <p class="text-red-500 text-xs italic">{{ $errors->first('file') }}</p>
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

<script>
function doSubmit(){
    var price = document.getElementById('price').value.replace(",",".");
    document.getElementById('price').value = document.getElementById('price').value.replace(",",".");
}
</script>