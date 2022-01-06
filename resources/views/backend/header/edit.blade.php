@extends('layouts.backendapp')

@section('content')
    <div class="right_col">
        <div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
                              
								<form method="POST" action="{{route('backend.header.update', $data[0]->id)}}" enctype="multipart/form-data"
                                    class="form-horizontal form-label-left">
                                    @csrf
                                    @method('PUT')
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Insert Logo
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="file" id="logo" name="logo" class="form-control ">
                                            @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                             <img src="{{asset('storage/logo/'. $data[0]->logo)}}" height="60" alt="">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="title" name="title" value="{{$data[0]->title}}" class="form-control">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
