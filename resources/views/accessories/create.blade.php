@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-body bg-form">
            @if(Session::has('accessories_created'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong></strong> {!! session('accessories_created') !!}
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
            <div class="card-header text-center font-weight-bold title-form">CREATE ACCESSORIES</div>
            <div class="card-body">
                <form enctype="multipart/form-data" name="package-create-form" id="add-blog-post-form" method="post" action="{{url('accessories/create')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="code" class="forlabel">Code</label>
                            <input type="text" id="title" name="code" class="form-control" required="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="accessories" class="forlabel">Accessories</label>
                            <input type="text" id="title" name="name" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="type" class="forlabel">Type</label>
                            <input type="text" id="title" name="type" class="form-control" required="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="duration" class="forlabel">Duration</label>
                            <input type="text" name="duration" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="price" class="forlabel">Price</label>
                            <input type="float" id="price" name="price" class="form-control" required="">
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::label('image', 'Image') !!}
                            {!! Form::file('image', array('class'=>'form-control')) !!}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary" href="{!! url('/accessories')!!}">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection