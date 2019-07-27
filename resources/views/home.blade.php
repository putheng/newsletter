<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/icons/favicon.ico">
        <title>Home</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <admin-dashboard/>
        </div>

        <script src="{{ asset('js/app.js?v='. time()) }}"></script>
        
    </body>
</html>