@extends('admin.layout')
@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row text-center">
						<div class="col">
							<h3 class="page-title mt-5">Add Tent</h3> </div>
					</div>
				</div>
				@if(Session::has('tent_add'))
					<div class="alert alert-primary alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<strong> {!! session('tent_add') !!}</strong>
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
						<form enctype="multipart/form-data" name="package-create-form" id="add-blog-post-form" action="{{route('tents.store')}}" method="post">
						@csrf
						<!-- @csrf_field -->
						<!-- @method('PUT') -->
						<!-- {{ csrf_field() }} -->
							<div class="row formtype d-flex justify-content-center">
                                <div class="col-md-9 ">
									<div class="form-group">
										<label>Tent Name</label>
										<input class="form-control" type="text" name = "name">
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label>Type</label>
										<input class="form-control" type="text" name = "type">
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
                                        <label>Price</label>
                                        <input  type="number" name ="price" class="form-control">
									</div>
								</div>
								<div class="col-md-9" >
									<!-- <div class="input-group" style="width: 50%;">
										<div class="input-group-prepend">
										  <span class="input-group-text" id="inputGroupFileAddon01">Iamge</span>
										</div>
										<div class="custom-file">
										  <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
											aria-describedby="inputGroupFileAddon01">
										  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
										</div>
									  </div> -->
									{!! Form::label('image', 'Image:') !!}
                					{!! Form::file('image', array('class'=>'form-control')) !!}
								</div>
							</div>
							<div class="row d-flex justify-content-center">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
                                    <a class="btn btn-primary buttonedit" href="{{route('tents.index')}}">All Tent</a>
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection 