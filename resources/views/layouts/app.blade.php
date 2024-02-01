<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mbo Portal</title>
    <script src="https://cdn.tiny.cloud/1/peugae2grgdfpwi05wj39czy2e55ktbykn2l5c0f0c02m5lu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="e4ebe7 font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation' )
        <div class="py-8 max-sm:ml-2 sm:mr-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @include('includes.message')
                <div class="h-16">
                
                </div>
                <div id="content"class="grid gap-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
<footer style="background-image:url({{url('footer.png')}})">
<div>
        <div class="py-8 max-sm:ml-2 sm:mr-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.footer')
                <div class="h-16">
        </div>
    </div>
</footer>
</html>
