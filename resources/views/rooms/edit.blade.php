@extends('admin.layout')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">Edit Room</h3> </div>
					</div>
				</div>
				@if(Session::has('room_updated'))
				<div class="alert alert-primary alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>{!! session('room_updated') !!}</strong>
				</div>
				@endif
                @if (count($errors) > 0)
                    <!-- Form Error List -->
                    <div class="alert alert-danger">
                        <strong>Something is Wrong</strong>
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				<div class="row">
					<div class="col-lg-12">
					{!! Form::model($rooms , array('route' => array('rooms.update', $rooms->id), 'method'=>'PUT','files'=>'true')) !!}
						@csrf
						<!-- @csrf_field -->
						<!-- @method('PUT') -->
						<!-- {{ csrf_field() }} -->
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>Room Name</label>
										<input class="form-control" type="text" value="{{ $rooms->name }}" name = "name">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="type">Type</label>
                                        <input  type="text" name ="type" value="{{ $rooms->name_type }}" class="form-control">
									</div>
								</div>
                                <div class="col-md-4">
									<div class="form-group">
										<label>Bed</label>
										<select class="form-control" id="sel" name="bed" value="{{ $rooms->bed }}">
											@if($rooms->bed)
												<option name="bed">{{ $rooms->bed }}</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
											@else
											<option >Select</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
											@endif
											</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Price</label>
										<input class="form-control" type="number" name = "price" value="{{ $rooms->price }}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<!-- <label>Image</label> -->
										<div class="custom-file mb-3">
										{!! Form::label('image', 'Image:') !!}
                						{!! Form::file('image', array('class'=>'form-control')) !!}
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
                            <a class="btn btn-primary buttonedit"  href="{{route('rooms.index')}}">Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection 