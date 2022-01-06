@extends('layouts.frontendapp')
  @section('frontendtittle', 'Blog')
	  
    @section('content')
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($data as $item)        
                    
                    <article>
                        <div class="post-image">
                            <div class="post-heading">
                                <h3><a href="#">{{$item->tittle}}</a></h3>
                            </div>
                            @if (isset($item->post_image) ? $item->post_image:'No Image')
                            <img src="{{asset('storage/post/'. $item->post_image)}}" alt="{{$item->post_image}}" />
                            @endif
                           
                            
                        </div>
                       
                        @if (isset($item->post_video) ? $item->post_video:'No video')
                        <div class="post-video">
								
                            <div class="video-containr">
                                <video controls>
                                    <source type="video/mp4" src="{{asset('storage/postvideo/'. $item->post_video)}}">
                                </video>
                            </div>
                        </div>
                        @endif
                        <div class="post-body">
                            <p>
                                {{  Str::limit($item->post_body, 200, '.......')}}
                            </p>
                        </div>
                        <div class="bottom-article">
                            <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#">{{$item->created_at->isoFormat('D MMM YYYY, dddd')}}</a></li>
                                <li><i class="icon-user"></i><a href="#">{{$item->user->name}}</a></li>
                                <li><i class="icon-folder-open"></i>
                                    @foreach ($item->categories as $cat_item)
                                                <a href="#"> {{$cat_item->name}}</a>
                                    @endforeach
                                </li>
                                <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                            </ul>
                            <a href="{{route('frontend.blog.single' , $item->slug)}}" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                        </div>
                        <div class="clear"></div>
                    </article>
                   @endforeach 
                   {{ $data->links() }}
                    {{-- <div id="pagination">
                        <span class="all">Page 1 of 3</span>
                        <span class="current">1</span>
                        <a href="#" class="inactive">2</a>
                        <a href="#" class="inactive">3</a>
                    </div> --}}
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
                            @foreach ($data as $item) 
                            <li>
                                    <!-- <img src="img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" /> -->
                                    <h6><a href="#">{{$item->tittle}}</a></h6>
                                    <p>
                                        {{  Str::limit($item->post_body, 100, '...')}}
                                    </p>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading">Popular tags</h5>
                            <ul class="tags">
                            @foreach ($cat_data as $item)
                                <li><a href="#">{{$item->name}}</a></li>
                            @endforeach
                                <!-- <li><a href="#">Web design</a></li>
                                <li><a href="#">Trends</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Internet</a></li>
                                <li><a href="#">Tutorial</a></li>
                                <li><a href="#">Development</a></li> -->
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section> 
    @endsection