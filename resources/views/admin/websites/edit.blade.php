@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">
            Bewerk website
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" onsubmit="doSubmit()" action="{{ route('admin.websites.update', $website) }}" enctype="multipart/form-data">
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
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="link">
                                Link *
                            </label>
                            <input
                            value="{{old('link', $website->link)}}" class="shadow appearance-none border @error('link') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="link" id="link" type="text">
                            @if ($errors->has('link'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('link') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="isPublic">
                                Weergave op MBO Portal *
                            </label>
                            <select class="appearance-none rounded w-full" id="isPublic" name="isPublic">
                                <option value="0" @if(old('isPublic') !== null && old('isPublic') == 0) selected @else @if(!$website->isPublic && !$website->isPublic) selected @endif @endif>Privé</option>
                                <option value="1" @if(old('isPublic') !== null && old('isPublic') == 1) selected @else @if(null == old('isPublic') && $website->isPublic) selected @endif @endif >Publiek</option>
                            </select>
                            @if ($errors->has('isPublic'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('isPublic') }}</p>
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