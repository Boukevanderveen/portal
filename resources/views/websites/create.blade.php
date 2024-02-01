@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-5 gap-4">

        <div class="text-3xl col-start-1 col-span-5">
            Nieuwe website
        </div>

        <div class="col-start-1 col-span-5 w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
            <form method="post" onsubmit="doSubmit()" action="{{ route('websites.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-5 gap-4">
                    <div class="text-3xl col-start-1 col-span-5 lg:col-start-2 lg:col-span-3">
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Naam *
                            </label>
                            <input value="{{ old('name') }}"
                                class="shadow appearance-none border @error('name') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="name" id="name" type="text">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="link">
                                Link *
                            </label>
                            <input value="{{ old('link') }}"
                                class="shadow appearance-none border @error('link') border-red-500 @enderror  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                name="link" id="link" type="text">
                            @if ($errors->has('link'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('link') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="isPublic">
                                Weergave op MBO Portal *
                            </label>
                            <select class="text-sm w-full p-2.5 rounded border border-gray-300" id="isPublic"
                                name="isPublic">
                                <option value="0" @if (old('isPublic') !== null && old('isPublic') == 0) selected @endif>Privé</option>
                                <option value="1" @if (old('isPublic') !== null && old('isPublic') == 1) selected @endif>Publiek</option>
                            </select>
                            @if ($errors->has('isPublic'))
                                <p class="text-red-500 text-xs italic">{{ $errors->first('isPublic') }}</p>
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
    function doSubmit() {
        var price = document.getElementById('price').value.replace(",", ".");
        document.getElementById('price').value = document.getElementById('price').value.replace(",", ".");
    }
</script>
