<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

       
        @vite('resources/css/app.css')
      
    </head>
    <body class="antialiased bg-gray-300 overflow-hidden">
        <div id="app" class=" w-full h-screen  ">
            <app-slider :images="{{$images}}"></app-slider>
        </div>
        @vite('resources/js/app.js')
    </body>
</html>
