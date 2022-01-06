@extends('layouts.backendapp')
@section('content')
    <div class="right_col">
		<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12  ">
							<div class="x_panel">
							  <div class="x_title">
								<h2>All Posts</h2>
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
                                        <th class="column-title">Author</th>
                                        <th class="column-title">Category</th>
										<th class="column-title">Image</th>
										<th class="column-title">Tittle</th>
                                        <th class="column-title">Slug</th>
										<th class="column-title">Description</th>
                                        <th class="column-title">Post Time</th>
										<th class="column-title">Status</th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
										</th>
										
									  </tr>
									</thead>
			
									<tbody>
									  @forelse ($data as $item)
									  <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>
                                            @foreach ($item->categories as $cat_item)
                                                {{$cat_item->name}}
                                            @endforeach
                                        </td>
										<td><img src="{{asset('storage/post/'. $item->post_image)}}" alt="" width="60"></td>
                                        <td>{{$item->tittle}}</td>
                                        <td>
											@foreach ($item->categories as $cat_item)
											{{$cat_item->slug}}
										@endforeach
											
										
										</td>
										<td>{{Str::limit($item->post_body ,15)}}</td>
										<td>{{$item->created_at->isoFormat('D MM YYYY, dddd')}}</td>
										<td><span class="badge badge-{{$item->status== 1 ? 'primary': 'danger' }}">
										{{$item->status == 1 ? 'active': 'deactive'}}</span></td>
										<td>
										   <a href="{{route('backend.post.edit' , $item->id)}}" class="btn btn-success text-white">Edit</a>
										 <form style="display: inline" action="{{route('backend.post.destroy', $item->id)}}" method="POST">
											 @csrf
											 @method('DELETE')
											 <button type="submit" class="btn btn-danger text-white">Delete</button>
										 </form>  
										   
										</td>
									</tr> 
									  @empty
										  <tr>
											  <td>No Post</td>
										  </tr>
									  @endforelse
									</tbody>
								  </table>
								</div>
										
									
							  </div>
							</div>
						  </div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-12  ">
							<div class="x_panel">
							  <div class="x_title">
								<h2>Trash Posts</h2>
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
                                        <th class="column-title">Author</th>
                                        <th class="column-title">Category</th>
										<th class="column-title">Image</th>
										<th class="column-title">Tittle</th>
                                        <th class="column-title">Slug</th>
                                        <th class="column-title">Description</th>
										<th class="column-title">Status</th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
										</th>
										
									  </tr>
									</thead>
			
									<tbody>
									  @forelse ($trash_data as $item)
									  <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>
                                            @foreach ($item->categories as $cat_item)
                                                {{$cat_item->name}}
                                            @endforeach
                                        </td>
										<td><img src="{{asset('storage/post/'. $item->post_image)}}" alt="" width="60"></td>
                                        <td>{{$item->tittle}}</td>
                                        <td>{{$item->slug}}</td>
                                        <td>{{Str::limit($item->post_body ,15)}}</td>
										<td><span class="badge badge-{{$item->status== 1 ? 'primary': 'danger' }}">
										{{$item->status == 1 ? 'active': 'deactive'}}</span></td>
										<td>
										   <a href="{{route('backend.post.restore' , $item->id)}}" class="btn bg-success text-white">Restore</a>
										   <button type="submit" class="btn btn-danger text-white permanent_delete"
										   value="{{route('backend.post.permanentDelete' , $item->id)}}">Permanent Delete</button>
										   
										</td>
									</tr> 
									  @empty
										  <tr>
											  <td>No Post</td>
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