@extends('admin.layout')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-12 header-titile bg-light text-dark">
                <h4><i class="fa-solid fa-user iuser"></i>    Room Type</h4>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-right" style="margin-bottom:20px;">
              <a class="btn btn-primary btn-addUser" href="{{ route('room_type.create') }}"><i class="fa-solid fa-circle-plus"></i> New Type </a>
          </div>
      </div>
    </div>
    <div class="row">
      @if(Session::has('typeRoom'))
        <div class="alert alert-primary alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong> {!! session('typeRoom') !!}</strong>
        </div>
      @endif
      @if(Session::has('delete_type'))
        <div class="alert alert-primary alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong> {!! session('delete_type') !!}</strong>
        </div>
      @endif
    </div>
        
    <div class="row">
        <div class="col-md-9">
            <table id="tbl_user" class="table-hover table table-bordered text-center" style =" top:20px; ">
                <thead>
                  <tr id="trhead">
                    <th width="200px">Type</th>
                    <th width="150px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($room_type as $item)
                      <tr>
                        <td>{{ $item->name_type }}</td>
                        <td>
                          <a class="btn btn-primary" href="{!! url('category/' . $item->id . '/edit') !!}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['room_type.destroy', $item->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                          {{-- <a href=""></a> --}}
                          {{-- {!! Form::open(array('url'=>'category/'. $item->id, 'method'=>'DELETE')) !!}
                          {!! csrf_field() !!}
                          {!! method_field('DELETE') !!}
                            <button class="btn btn-danger">Delete</button>
                          {!! Form::close() !!} --}}
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table> 
        </div>
    </div>
</div>
@endsection