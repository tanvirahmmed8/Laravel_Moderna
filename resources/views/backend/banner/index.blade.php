@extends('layouts.backendapp')

@section('content')
    <div class="right_col">
        <div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Add Banner</h2>
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
									<form method="POST" action="{{route('backend.banner.store')}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="tittle">Tittle
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="tittle" name="tittle" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea name="description" id="description" class="form-control" style="height:200px"></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="image" class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="image" class="form-control" type="file" name="image">
												@error('image')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="btn_text">Button Text
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="btn_text" name="btn_text" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="btn_url">Button Url
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="btn_url" name="btn_url" class="form-control ">
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12  ">
							<div class="x_panel">
							  <div class="x_title">
								<h2>All Banners</h2>
								<ul class="nav navbar-right panel_toolbox">
								  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								  </li>
								  <li><a class="close-link"><i class="fa fa-close"></i></a>
								  </li>
								</ul>
								<div class="clearfix"></div>
							  </div>
			
							  <div class="x_content">
								<div class="table-responsive">
								  <table class="table table-striped jambo_table bulk_action">
									<thead>
									  <tr class="headings">
										
										<th class="column-title">Id </th>
										<th class="column-title">Image</th>
										<th class="column-title">Description</th>
										<th class="column-title">Button Text</th>
										<th class="column-title">Button Url</th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
										</th>
										
									  </tr>
									</thead>
			
									<tbody>
									  @forelse ($data as $item)
									  <tr>
										<td>{{ $item->id }}</td>
										<td><img src="{{asset('storage/banner/'. $item->image)}}" alt="" width="60"></td>
										<td>{{ $item->tittle }}</td>
										<td>{{ $item->description }}</td>
										<td>{{ $item->btn_text }}</td>
										<td>
										   <a href="{{route('backend.banner.edit' , $item->id)}}" class="badge bg-success text-white">Edit</a>
										 <form style="display: inline" action="{{route('backend.banner.destroy', $item->id)}}" method="POST">
											 @csrf
											 @method('DELETE')
											 <button type="submit" class="badge bg-danger text-white">Delete</button>
										 </form>  
										   
										</td>
									</tr> 
									  @empty
										  <tr>
											  <td>No Banner</td>
										  </tr>
									  @endforelse
									</tbody>
								  </table>
								</div>
										
									
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