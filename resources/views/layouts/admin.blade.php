<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    

        
        @yield('plugin')
       
        <title>{{config('app.name')}}@yield('title')</title>

    </head>
    <body>
		@include('admin.header')

        <div class="row expanded">
            <div class="columns medium-2">
                <ul class="menu vertical" >
                    <li><a href="/">{{trans('layout.home')}}</a></li>
                    <li><a href="{{ url('/setting') }}">{{trans('layout.setting')}}</a></li>
                    @if(session()->get('statut') != 'user' )
                    <li><a href="{{ url('/posts') }}">{{trans('layout.posts')}}</a></li>
                    @endif
                    @if(session()->get('statut') == 'admin' || session()->get('statut') == 'super')
                    <li><a href="{{ url('/members') }}">{{trans('layout.members')}}</a></li>

                    <li><a href="{{ url('/messages/inbox') }}">{{trans('layout.messages')}}</a></li>
                    <li><a href="{{ url('/analytics') }}">{{trans('layout.analytics')}}</a></li>

                    @endif
                    @if(session()->get('statut') == 'super')
                    <li><a href="{{ url('/wiki') }}">Wiki</a></li>
                    <li><a href="{{ url('/problems') }}">Problems</a></li>
                    <li><a href="{{ url('/constructor') }}">Constructor</a></li>  
                    @endif
                </ul>
            </div>
            <div class="columns medium-10">
                @yield('content') 
            </div>
        </div>
        
       

		@include('admin.footer')
        
        <script src="{{ asset('/js/app.js') }}"></script>
        
        @yield('js')

        
    </body>
</html>