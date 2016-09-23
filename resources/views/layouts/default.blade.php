<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.js"></script>


        
        @yield('plugin')
       
        <title>{{config('app.name')}} @yield('title')</title>

    </head>
    <body>
		@yield('content') 
        
        <script src="{{ asset('/js/app.js') }}"></script>
        
        @yield('js')

        
    </body>
</html>