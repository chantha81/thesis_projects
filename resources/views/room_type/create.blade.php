@extends('admin.layout')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-12 header-titile bg-light text-dark">
                <h4><i class="fa-solid fa-circle-plus"></i> Create </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('room_type.index') }}" style="padding-left: 0;"><i
                        class="fa-solid fa-users"></i> Lists </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <form action="{{route('room_type.store')}}" class="frm_room_type" method="POST">
                @csrf
                <input type="text" class="form-control" name="room_type" placeholder="Type Room">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
