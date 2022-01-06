@extends('layouts.frontendapp')
  @section('frontendtittle', $data->tittle)
	  
    @section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('frontend.blog')}}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                        <li class="active">Blog</li>
                        <li><a href="#">{{$data->tittle}}</a><i class="icon-angle-right"></i></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    
                    <article>
                        <div class="post-image">
                            <div class="post-heading">
                                <h3><a href="#">{{$data->tittle}}</a></h3>
                            </div>
                            @if (isset($data->post_image) ? $data->post_image:'No Image')
                            <img src="{{asset('storage/post/'. $data->post_image)}}" alt="{{$data->post_image}}" />
                            @endif
                            {{-- <img src="{{asset('storage/post/'. $data->post_image)}}" alt="" /> --}}
                        </div>
                        @if (isset($data->post_video) ? $data->post_video:'No video')
                        <div class="post-video">
								
                            <div class="video-containr">
                                <video controls>
                                    <source type="video/mp4" src="{{asset('storage/postvideo/'. $data->post_video)}}">
                                </video>
                            </div>
                        </div>
                        @endif
                       
                        <p>
                            {{$data->post_body}}
                        </p>
                        <div class="bottom-article">
                            <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#">{{$data->created_at->isoFormat('D MM YYYY, dddd')}}</a></li>
                                <li><i class="icon-user"></i><a href="#">{{$data->user->name}}</a></li>
                                <li><i class="icon-folder-open"></i>
                                    @foreach ($data->categories as $cat_item)
                                                <a href="#"> {{$cat_item->name}}</a>
                                            @endforeach
                                </li>
                                <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                            </ul>
                        </div>
                    </article>
                 
                </div>
                <div class="col-lg-4">
                    <aside class="right-sidebar">
                        <div class="widget">
                            <form class="form-search">
                                <input class="form-control" type="text" placeholder="Search..">
                            </form>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading">Categories</h5>
                            <ul class="cat">
                                @foreach ($cat_data as $item)
                                <li><i class="icon-angle-right"></i><a href="#">{{$item->name}}</a><span> ({{count($item->posts)}})</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading">Latest posts</h5>
                            <ul class="recent">
                                @foreach ($data_t as $item)
                                <li>
                                    {{-- <img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" /> --}}
                                    <h6><a href="#">{{$item->tittle}}</a></h6>
                                    <p>
                                       {{  Str::limit($item->post_body, 100, '...')}}
                                    </p>
                                </li>
                                @endforeach
                                {{-- <li>
                                    <a href="#"><img src="img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt="" /></a>
                                    <h6><a href="#">Maiorum ponderum eum</a></h6>
                                    <p>
                                        Mazim alienum appellantur eu cu ullum officiis pro pri
                                    </p>
                                </li>
                                <li>
                                    <a href="#"><img src="img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt="" /></a>
                                    <h6><a href="#">Et mei iusto dolorum</a></h6>
                                    <p>
                                        Mazim alienum appellantur eu cu ullum officiis pro pri
                                    </p>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading">Popular tags</h5>
                            <ul class="tags">
                                <li><a href="#">Web design</a></li>
                                <li><a href="#">Trends</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Internet</a></li>
                                <li><a href="#">Tutorial</a></li>
                                <li><a href="#">Development</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section> 
    @endsection