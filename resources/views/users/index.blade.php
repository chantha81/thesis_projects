@extends('admin.layout')
@section('content')
<div class="page-wrapper">
  <div class="content container-fluid">
    <div class="page-header">
      <div class="row align-items-center">
          <div class="col-md-12 header-titile bg-light text-dark">
              <h4><i class="fa-solid fa-user iuser"></i>    Staff</h4>
          </div>
      </div>
  </div>
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-right" style="margin-bottom:20px;">
              <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fa-solid fa-circle-plus"></i> New User </a>
          </div>
      </div>
  </div>
  
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  
  <table class="table table-bordered text-center" style =" top:20px; ">
   <tr>
     <th>No</th>
     <th>Name</th>
     <th>Email</th>
     <th>Roles</th>
     <th width="280px">Action</th>
   </tr>
   @foreach ($data as $key => $user)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        @if(!empty($user->getRoleNames()))
          @foreach($user->getRoleNames() as $v)
             <label class="badge badge-success role-user">{{ $v }}</label>
          @endforeach
        @endif
      </td>
      <td>
         <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
         <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
      </td>
    </tr>
   @endforeach
  </table> 
  {!! $data->render() !!}
  </div>
</div>
@endsection