@if(Session::has('succes'))
<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
    <div class="flex">
      <div>

        <p class="font-bold">{{ Session::get('succes') }}</p>
      </div>
    </div>
  </div>
@endif
@if(Session::has('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">{{ Session::get('error') }}</strong>

  </div>
@endif


