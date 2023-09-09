@extends('admin.layout')
@section('content')
<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-body bg-form">
            @if(Session::has('Accessorie_Updated'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('Accessorie_Updated') !!}
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
            <div class="card-header text-center font-weight-bold title-form">EDIT ACCESSORIES</div>
            <div class="card-body">
                <!-- <form enctype="multipart/form-data" method="PUT" action="{{ route('accessories.update',$accessories->id) }}"> -->
                {!! Form::model($accessories , array('route' => array('accessories.update', $accessories->id), 'method'=>'PUT','files'=>'true')) !!}
                @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="code" class="forlabel">Code</label>
                            <input type="text" id="title" name="code" value="{{ $accessories->code }}" class="form-control" required="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="accessories" class="forlabel">Accessories</label>
                            <input type="text" id="title" name="name" value="{{ $accessories->name }}" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="type" class="forlabel">Type</label>
                            <input type="text" id="title" name="type" value="{{ $accessories->type }}" class="form-control" required="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="duration" class="forlabel">Duration</label>
                            <input type="text" name="duration" value="{{ $accessories->duration }}" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="price" class="forlabel">Price</label>
                            <input type="float" id="price" name="price" value="{{ $accessories->price }}" class="form-control" required="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="image" class="forlabel">Image</label>
                            <input type="file" name="image" value="{{ $accessories->image }}" class="form-control" required="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
@endsection