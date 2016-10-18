
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
    
    
    @foreach(config('navigation') as $group)
        
        @foreach($group as $row)

            @include('admin.navigation_item', $row)
        
        @endforeach
    
        @if(!$loop->last)
        <li class="divide"></li>
        @endif
    @endforeach
    

</ul>