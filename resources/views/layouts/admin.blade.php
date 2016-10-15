<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=1440, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> -->
        <link rel="stylesheet" href="{{asset('/css/admin/app.css')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
    

        
        @yield('plugin')
       
        <title>{{config('app.name')}}@yield('title')</title>

    </head>
    <body>

        <div class="row expanded collapse">
            <div class="columns medium-2 console-nav">
                @include('admin.navigations')
            </div>
            <div class="columns medium-10">
                @include('admin.header')
                @yield('content') 
            </div>
        </div>
        
       

        @include('admin.footer')
        
        <script src="{{ asset('/js/admin/app.js') }}"></script>
        <script>
            function confirmDelete(e, message)
            {
                if (confirm(message)) {
                    $(e).parents('form').submit();
                }
            }
        </script>
        @yield('js')

        
    </body>
</html>