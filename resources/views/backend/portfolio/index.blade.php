@extends('layouts.backendapp')

@section('content')
    <div class="right_col">
        <div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Add Portfolio</h2>
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
									<form method="POST" action="{{route('backend.portfoliopost.store')}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="tittle">Tittle
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="tittle" value="{{old('tittle')}}" name="tittle" class="form-control ">
                                                @error('tittle')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <textarea name="description" id="" class="form-control" style="height: 200px">{{old('description')}}</textarea>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="tittle">Post Category
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <select name="post_cat" id="" class="form-control">
													<option>Select a Category</option>
													@foreach ($cat_data as $item)
														<option value="{{$item->id}}">{{$item->name}}</option>
													@endforeach
												</select>
												@error('post_cat')
													<div class="text-danger">{{ $message }}</div>
												@enderror
											</div>
                                        </div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <input type="file" id="image" name="image" class="form-control ">
                                                @error('image')
													<div class="text-danger">{{ $message }}</div>
												@enderror
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
								<h2>All Portfolio</h2>
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
										<th class="column-title">Tittle</th>
										<th class="column-title">Description</th>
										<th class="column-title">Category</th>
										<th class="column-title">Image</th>
										<th class="column-title">status</th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
										</th>
										
									  </tr>
									</thead>
										@foreach ($portfolio as $item)
											<tr>
												<td>{{$item->id}}</td>
											<td>{{$item->tittle}}</td>
											<td>{{Str::limit($item->description , 15)}}</td>
											<td>{{$item->CategoriesWork->name}}</td>
											<td><img src="{{asset('storage/work/'.$item->portfolio_img)}}" height="60" alt=""></td>
											 <td>
												<span class="badge badge-{{$item->status==1 ? 'primary': 'danger'}}">
													{{$item->status==1 ? 'Active': 'Deactive'}}</span>
											 </td>
											<td>
												<a href="{{route('backend.status', $item->id)}}" class="btn bg-warning btn-small">
													{{$item->status==1 ? 'Deactive' : 'Active'}}
												</a>


												<a href="{{route('backend.portfoliopost.edit' , $item->id)}}" 
												class="btn btn-small bg-success">Edit</a>

												<form style="display:inline" action="{{route('backend.portfoliopost.destroy' , $item->id)}}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-small bg-danger">Delete</button>
												</form>
												
											</td>
											</tr>
										@endforeach
									<tbody>
									 
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