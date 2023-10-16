@extends('admin.layout')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row text-center">
						<div class="col">
							<h3 class="page-title mt-5">Edit Tent</h3> </div>
					</div>
				</div>
                @if(Session::has('room_created'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong></strong>{!! session('room_created') !!}
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
						{{-- <form enctype="multipart/form-data" name="package-create-form" id="add-blog-post-form" action="{{route('tents.update',$tent->id)}}" method="POST"> --}}
                        {{-- {{dd($tent->image);}} --}}
                            {!! Form::model($tent, ['method' => 'PATCH','route' => ['tents.update', $tent->id]]) !!}
						@csrf
						<!-- @csrf_field -->
						@method('PUT')
						<!-- {{ csrf_field() }} -->
							<div class="row formtype d-flex justify-content-center">
                                <div class="col-md-9 ">
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" type="text" name = "name" value="{{$tent->name}}">
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label>Type</label>
										<input class="form-control" type="text" name = "type" value="{{$tent->type}}">
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
                                        <label>Price</label>
                                        <input  type="text" name ="price" class="form-control" value="{{$tent->price}}">
									</div>
								</div>
                                <div class="col-md-9">
									<div class="input-group" style="width: 50%;">
										<div class="input-group-prepend">
										  <span class="input-group-text" id="inputGroupFileAddon01">Iamge</span>
										</div>
										<div class="custom-file">
										  <input type="file" value="{{$tent->image}}" name="image" class="custom-file-input" id="inputGroupFile01"
											aria-describedby="inputGroupFileAddon01">
										  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
										</div>
									  </div>
								</div>
							</div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
                                    <a class="btn btn-primary buttonedit" href="{{route('tents.index')}}">Back</a>
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection 