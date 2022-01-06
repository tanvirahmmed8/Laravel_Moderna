@extends('layouts.frontendapp')
  @section('frontendtittle', 'Home')
	  
	@section('content')
		
		<!-- end header -->
		<section id="featured">
			<!-- start slider -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!-- Slider -->
						<div id="main-slider" class="flexslider">
							<ul class="slides">
								@foreach ($banner_data as $item)
								<li>
									<img src="{{asset('storage/banner/'. $item->image)}}" alt=""/>
									<div class="flex-caption">
										<h3>{{$item->tittle}}</h3>
										<p>{{$item->description}}</p>
										<a href="{{$item->btn_url}}" class="btn btn-theme">{{$item->btn_text}}</a>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>



		</section>
		<section class="callaction">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="big-cta">
							<div class="cta-text">
								<h2><span>Moderna</span> HTML Business Template</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-3">
								<div class="box">
									<div class="box-gray aligncenter">
										<h4>Fully responsive</h4>
										<div class="icon">
											<i class="fa fa-desktop fa-3x"></i>
										</div>
										<p>
											Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
										</p>

									</div>
									<div class="box-bottom">
										<a href="#">Learn more</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="box">
									<div class="box-gray aligncenter">
										<h4>Modern Style</h4>
										<div class="icon">
											<i class="fa fa-pagelines fa-3x"></i>
										</div>
										<p>
											Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
										</p>

									</div>
									<div class="box-bottom">
										<a href="#">Learn more</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="box">
									<div class="box-gray aligncenter">
										<h4>Customizable</h4>
										<div class="icon">
											<i class="fa fa-edit fa-3x"></i>
										</div>
										<p>
											Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
										</p>

									</div>
									<div class="box-bottom">
										<a href="#">Learn more</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="box">
									<div class="box-gray aligncenter">
										<h4>Valid HTML5</h4>
										<div class="icon">
											<i class="fa fa-code fa-3x"></i>
										</div>
										<p>
											Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
										</p>

									</div>
									<div class="box-bottom">
										<a href="#">Learn more</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- divider -->
				<div class="row">
					<div class="col-lg-12">
						<div class="solidline">
						</div>
					</div>
				</div>
				<!-- end divider -->
				<!-- Portfolio Projects -->
				<div class="row">
					<div class="col-lg-12">
						<h4 class="heading">Recent Works</h4>
						<div class="row">
							<section id="projects">
								<ul id="thumbs" class="portfolio">
									@foreach ($work_data as $item)
									<li class="col-lg-3 design">
										<div class="item-thumbs">
											<!-- Fancybox - Gallery Enabled - Title - Full Image -->
											<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="{{$item->tittle}}"
												 href="{{asset('storage/work/'. $item->portfolio_img)}}">
											<span class="overlay-img"></span>
											<span class="overlay-img-thumb font-icon-plus"></span>
											</a>
											<!-- Thumb Image and Description -->
											<img src="{{asset('storage/work/'. $item->portfolio_img)}}" alt="{{$item->description}}">
										</div>
									</li>
									@endforeach
									
									<!-- End Item Project -->
								</ul>
							</section>
						</div>
					</div>
				</div>

			</div>
		</section>
	@endsection	
	
	
