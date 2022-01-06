@extends('layouts.frontendapp')
  @section('frontendtittle', 'Portfolio')
	  
    @section('content')
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                            <li class="active">Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="portfolio-categ filter">
                            <li class="all active"><a href="#">All</a></li>

                            @foreach ($data_cat as $item)
                                <li class="{{$item->slug}}"><a href="#" title="">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                        <div class="clearfix">
                        </div>
                        <div class="row">
                            <section id="projects">
                                <ul id="thumbs" class="portfolio">
                                    
                                     @foreach ($data as $item)
                                        <li class="item-thumbs col-lg-3 design" data-id="id-{{$item->CategoriesWork->id}}" 
                                            data-type="{{$item->CategoriesWork->slug}}">
                                            <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="{{$item->tittle}}" 
                                                href="{{asset('storage/work/'. $item->portfolio_img)}}">
                                            <span class="overlay-img"></span>
                                            <span class="overlay-img-thumb font-icon-plus"></span>
                                            </a>
                                            
                                            <img src="{{asset('storage/work/'. $item->portfolio_img)}}" alt="{{$item->description}}">
                                        </li>
                                        
                                     @endforeach
                                    
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection