@extends('admin.layout')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">Add Room</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form enctype="multipart/form-data" name="package-create-form" id="add-blog-post-form" action="{{url('rooms/add_room')}}" method="post">
						@csrf
						<!-- @csrf_field -->
						<!-- @method('PUT') -->
						<!-- {{ csrf_field() }} -->
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>Room Number</label>
										<input class="form-control" type="text" name = "room_number">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="room_name">Name</label>
                                        <input  type="text" name ="room_name" class="form-control">
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>Bed</label>
										<select class="form-control" id="sel" name="bed">
											<option>Select</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Price</label>
										<input class="form-control" type="text" name = "price">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Image</label>
										<div class="custom-file mb-3">
											<input type="file" class="custom-file-input" id="customFile" name="filename">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
						</form>
					</div>
				</div>
				<button type="button" class="btn btn-primary buttonedit">Cancel</button>
			</div>
		</div>
@endsection