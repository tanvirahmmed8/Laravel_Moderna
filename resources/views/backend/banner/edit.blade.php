@extends('layouts.backendapp')

@section('content')
    <div class="right_col">
        <div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Banner <a href="{{route('backend.banner.index')}}" class="btn btn-small bg-green">All Banner</a></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="POST" action="{{route('backend.banner.update' , $banner->id)}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                        @csrf
                                        @method('PUT')
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="tittle">Tittle
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="tittle" name="tittle" class="form-control " value="{{$banner->tittle}}">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <textarea name="description" id="description" class="form-control" style="height:200px">{{$banner->description}}</textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="image" class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="image" class="form-control" type="file" name="image">
												@error('image')
													<div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <img src="{{asset('storage/banner/' .$banner->image)}}" alt="" height="80">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="btn_text">Button Text
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="btn_text" name="btn_text" class="form-control " value="{{$banner->btn_text}}">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="btn_url">Button Url
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="btn_url" name="btn_url" class="form-control" value="{{$banner->btn_url}}">
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												
												<button type="submit" class="btn btn-success">Update</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
	</div>
	
	@if (session('success'))
			<div class="toast bg-success" style="position: absolute; top: 0; right: 0; z-index:999; width:300;">
				<div class="toast-body">
				<p class="text-white">{{ session('success')}} </p>
				</div>
			</div>
	@endif
		

@endsection

@push('backendjs')
	<script>
		$('.toast').toast('show');
		$('.toast').toast({
			delay:3000
		});

	</script>
@endpush