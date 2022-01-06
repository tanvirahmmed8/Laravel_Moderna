<header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="{{route('frontend.home')}}">
                   @foreach ($foo as $item)
                   {{-- <span>Moderna{{$item->id}}</span> --}}
                   <img src="{{asset('storage/logo/'. $item->logo)}}" alt="{{$item->title}}">
                   @endforeach
                </a>

            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li class="{{url()->current()== route('frontend.home') ? 'active' : ' '}}"><a href="{{route('frontend.home')}}">Home</a></li>
                    
                    <li class="{{url()->current()== route('frontend.portfolio') ? 'active' : ' '}}"><a href="{{route('frontend.portfolio')}}">Portfolio</a></li>
                    <li class="{{url()->current()== route('frontend.blog') ? 'active' : ' '}}"><a href="{{route('frontend.blog')}}">Blog</a></li>
                    <li><a href="">Contact</a></li>
                    <li class="{{url()->current()== route('login') ? 'active' : ' '}}"><a href="{{route('login')}}">Log In</a></li>
                    <li class="{{url()->current()== route('frontend.register') ? 'active' : ' '}}"><a href="{{route('frontend.register')}}">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>