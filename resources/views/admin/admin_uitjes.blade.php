<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- title onder nav bar -->
            {{ __('Uitjes & gastsprekers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- resources/views/livewire/uitje-show.blade.php -->
                    <livewire:uitje-show/>
                </div>
            </div>
        </div>
    </div>

<script>
window.addEventListener('close-modal', event => {
    $('#uitjeModal').modal('hide');
    $('#updateUitjeModal').modal('hide');
    $('#deleteUitjeModal').modal('hide');
})
</script>
</x-app-layout>