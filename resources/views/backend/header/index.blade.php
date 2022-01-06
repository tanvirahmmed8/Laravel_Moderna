@extends('layouts.backendapp')

@section('content')
    <div class="right_col">
        <div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Add Logo</h2>
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
									

									<form method="POST" action="{{route('backend.header.store')}}"  enctype="multipart/form-data" class="form-horizontal form-label-left">
										@csrf
                                    
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Insert Logo
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <input type="file" id="logo" name="logo" class="form-control ">
                                                @error('logo')
													<div class="text-danger">{{ $message }}</div>
												@enderror
                                              {{-- <img src="{{asset('storage/logo/'. $data->logo)}}" height="60" alt=""> --}}
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="title" name="title" class="form-control ">
                                                @error('title')
													<div class="text-danger">{{ $message }}</div>
												@enderror
                                              {{-- <img src="{{asset('storage/logo/'. $data->logo)}}" height="60" alt=""> --}}
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												
												<button type="submit" class="btn btn-success">Upload</button>
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
								<h2>All Categories</h2>
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
										<th class="column-title">Title</th>
										<th class="column-title">Logo</th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
										</th>
										
									  </tr>
									</thead>
			
									<tbody>
									  @foreach ($data as $item)
										  <tr>
											  <td>{{$item->id}}</td>
											  <td>{{$item->title}}</td>
											  <td><img src="{{asset( 'storage/logo/'. $item->logo)}}" alt=""></td>
											
											  <td>
												  <a href="{{route('backend.header.edit' , $item->id)}}" class="btn btn-small btn-primary">Edit</a>
												  <form action="" style="display: inline">
													  <input type="submit" class="btn btn-small btn-danger" value="Delete">
												  </form>
											  </td>
										  </tr>
									  @endforeach
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