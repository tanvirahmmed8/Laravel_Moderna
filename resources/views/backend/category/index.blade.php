@extends('layouts.backendapp')

@section('content')
    <div class="right_col">
        <div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Add Category</h2>
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
									<form method="POST" action="{{route('backend.category.store')}}" class="form-horizontal form-label-left">
										@csrf
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Category Name
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="name" name="name" class="form-control ">
                                                @error('name')
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
										<th class="column-title">Category</th>
										<th class="column-title">Slug</th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
										</th>
										
									  </tr>
									</thead>
			
									<tbody>
									  @foreach ($data as $item)
										  <tr>
											  <td>{{$item->id}}</td>
											  <td>{{$item->name}}</td>
											  <td>{{$item->slug}}</td>
											  <td>
												  <a href="{{route('backend.category.edit' , $item->id)}}" class="btn btn-small btn-primary">Edit</a>
												  {{-- <button type="submit" class="btn btn-danger text-white "
										   value="{{route('backend.category.destroy' , $item->id)}}">Delete</button> --}}

												  <form action="{{route('backend.category.destroy' , $item->id)}}" style="display: inline" method="POST">
													   @csrf
											 @method('DELETE')
													  <button type="submit" class="btn btn-small btn-danger permanent_delete">Delete</button>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script>
		$('.toast').toast('show');
		$('.toast').toast({
			delay:3000
		});

		$(function($){
			
			$('.permanent_delete').on('click' , function(){
				var link = $(this).val();
				Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'error',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			if (result.isConfirmed) {
				window.location = link; 
			}
		})
			});
		});

	</script>
@endpush