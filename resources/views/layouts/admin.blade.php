<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <ul class="menu vertical " >
                    <li class="text-center console-header">
                        {{config('app.name')}} <br>
                        {{trans('layout.webmaster')}}
                    </li>

                    <li class="profile">
                        <div class="media-object">
                            <div class="media-object-section text-center">
                                <div class="profile-small-icon">
                                    <img src="http://res.cloudinary.com/demo/image/upload/w_400,h_400,c_crop,g_face,r_max/w_128/lady.png" >
                                </div>
                                <a href="{{url('/logout')}}" class="logout">{{trans('layout.logout')}}</a>
                            </div>
                            
                            <div class="media-object-section">
                                <div class="profile-small-info">
                                    {{trans('layout.'. auth()->user()->role->slug)}} <br>
                                    {{auth()->user()->name}}
                                </div>
                            </div>
                        </div>
                    </li>

                    <li {{classActivePath('/')}}>
                        <a href="/">
                            <span class="icon-home bookmark text-center" ></span>{{trans('layout.home')}}<span class="icon-arrow float-right"></span>
                        </a>
                    </li>
                    @if(session()->get('statut') != 'user' )
                    <li {{classActiveSegment( 1, 'post' )}} {{classActiveSegment( 1, 'posts' )}}>
                        <a href="{{ url('/posts') }}"><span class="icon-page bookmark text-center" ></span> {{trans('layout.posts')}}<span class="icon-arrow float-right"></span></a>
                    </li>

                    <li {{classActiveSegment(1, 'postTypes')}}><a href="{{ url('/postTypes') }}"><span class="icon-page bookmark text-center" ></span> {{trans('layout.post_types')}}<span class="icon-arrow float-right"></span></a></li>

                    @endif
                    <li class="divide"></li>

                    <li {{classActiveSegment(1, 'messages')}}><a href="{{ url('/messages') }}"><span class="icon-mail bookmark text-center" style="font-size: 12px"></span> {{trans('layout.messages')}}<span class="icon-arrow float-right"></span></a></li>

                    
                    
                    @if(session()->get('statut') == 'admin' || session()->get('statut') == 'super')
                    <li {{classActiveSegment(1, 'members')}} {{classActiveSegment(1, 'member')}}><a href="{{ url('/members') }}"><span class="icon-members bookmark text-center" ></span> {{trans('layout.members')}}<span class="icon-arrow float-right"></span></a></li>
                    @endif

                    <li {{classActiveSegment(1, 'setting')}}><a href="{{ url('/setting') }}"><span class="icon-setting bookmark text-center" ></span> {{trans('layout.setting')}}<span class="icon-arrow float-right"></span></a></li>

                    @if(session()->get('statut') != 'user' )
                    <li {{classActivePath('analytics')}}><a href="{{ url('/analytics') }}"><span class="icon-analytics bookmark text-center" ></span> {{trans('layout.analytics')}}<span class="icon-arrow float-right"></span></a></li>
                    @endif
                    <li class="divide"></li>


                    @if(session()->get('statut') == 'super') 

                    <li {{classActivePath('jobs')}}><a href="{{ url('/jobs') }}"><span class="icon-page bookmark text-center" ></span> Jobs<span class="icon-arrow float-right"></span></a></li>  

                    <li class="divide"></li>
                    @endif


                    <li ><a href="{{ url('/support')}}"><span class="icon-support bookmark text-center" ></span> {{trans('layout.support')}}<span class="icon-arrow float-right"></span></a></li>
                </ul>
            </div>
            <div class="columns medium-10">
                @include('admin.header')
                @yield('content') 
            </div>
        </div>
        
       

        @include('admin.footer')
        
        <script src="{{ asset('/js/app.js') }}"></script>
        
        @yield('js')

        
    </body>
</html>