<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
    <title>Mobilise Product Launch</title>

    {{--    @livewireStyles--}}
</head>
<body class="bg-white font-serif">

<x-header></x-header>


@yield('content')

@livewireScripts

<x-footer></x-footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/qi9g9u6z80vq6bvc44xqbym0i1x146meknq4x5edogmaogds/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{ asset('js/my.js') }}"></script>
</body>
</html>

