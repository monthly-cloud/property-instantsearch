<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{config('app.name')}}</title>
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        <script src="{{mix('/js/app.js')}}"></script>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </body>
</html>