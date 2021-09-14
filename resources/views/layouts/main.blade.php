<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="bg-gray-100 space-y-5">
    <!-- nav -->
    <div class="p-4 bg-gray-800 space-x-2">
        <a href="/" class="py-2 px-5 bg-gray-400 rounded-xl hover:bg-gray-500 text-2xl
        @if(\Request::path() == '/') bg-gray-500 @endif ">home</a>
        <a href="{{ route('tasks.index')}}" class="py-2 px-5 bg-gray-400 rounded-xl hover:bg-gray-500 text-2xl
        @if(\Request::routeIs('tasks.*')) bg-gray-500 @endif ">tasks</a>
        <a href="{{ route('tags.index')}}" class="py-2 px-5 bg-gray-400 rounded-xl hover:bg-gray-500 text-2xl
        @if(\Request::routeIs('tags.*')) bg-gray-500 @endif ">tags</a>
    </div>
    <div class="container mx-auto min-h-screen">
        @yield('content')
    </div>
    <div class="bg-gray-800 h-20">FOOTER</div>
</body>

</html>