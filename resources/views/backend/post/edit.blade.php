@extends('layouts.backendapp')
 
@section('content')
    <div class="right_col">
        <div class="clearfix"></div>
					<div class="row">

						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Post</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br/>
									<form method="POST" action="{{route('backend.post.update', $post->id)}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="item form-group">
                                                    <label class="col-form-label col-sm-3 label-align" for="tittle">Tittle
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="tittle" value="{{$post->tittle}}" name="tittle" class="form-control ">
                                                        @error('tittle')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label  col-sm-3 label-align" for="description">Post Body
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <textarea name="post_body" class="form-control" id="descr"
                                                         style="height:250px">{{$post->post_body}}</textarea>
                                                            @error('post_body')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="item form-group">
                                                    <label class="col-form-label col-sm-3 label-align" for="image">Image
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="file" id="post_image" name="post_image" class="form-control ">
                                                        @error('post_image')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <img class="mt-3" src="{{asset('storage/post/'. $post->post_image)}}" width="350" alt="">
                                                    </div> 
                                                </div>
                                             
                                                <div class="item form-group">
                                                    <label class="col-form-label col-sm-3 label-align" for="image">Video
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="file" id="post_video" name="post_video" class="form-control ">
                                                        <video src="{{asset('storage/postvideo/'. $post->post_video)}}" width="350"></video>
                                                    </div>
                                                </div>
                                                
                                                <div class="ln_solid"></div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                                        
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-2">
                                                <div class="item row">
                                                    <h2 style="padding-bottom:10px;">Post Category</h2>
                                                    <hr>
                                                    <div class="col-12">

                                                        @foreach ($cat_data as $item)
                                                            
                                                            <p>
                                                                <input type="checkbox" name="categories[]" id="cat_{{$item->id}}" 
                                                                value="{{$item->id}}"

                                                                @foreach ($post->categories as $cat_item)
                                                                 {{ $item->id == $cat_item->id ? "checked" : "" }}
                                                                @endforeach
                                                                >

                                                                <label for="cat_{{$item->id}}"> {{$item->name}}</label>
                                                            </p>    
                                                            @endforeach
                                                        @error('categories')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
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