@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">
            Nieuw boek
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" onsubmit="doSubmit()" action="{{ route('admin.books.store') }}">
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
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="ISBN">
                                ISBN *
                            </label>
                            <input
                            value="{{old('ISBN')}}" class="shadow appearance-none border @error('ISBN') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="ISBN" id="ISBN" type="text">
                            @if ($errors->has('ISBN'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('ISBN') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                                Prijs (€) *
                            </label>
                            <input 
                            value="{{str_replace('.', ',', old('price')) }}" class="shadow appearance-none border @error('price') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="price" id="price" type="text">
                            @if ($errors->has('price'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('price') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Schooljaar *
                            </label>
                            <input
                            value="{{old('school_year')}}" class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="school_year" id="school_year" type="number">
                            @if ($errors->has('school_year'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('school_year') }}</p>
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

<script>
function doSubmit(){
    var price = document.getElementById('price').value.replace(",",".");
    document.getElementById('price').value = document.getElementById('price').value.replace(",",".");
}
</script>