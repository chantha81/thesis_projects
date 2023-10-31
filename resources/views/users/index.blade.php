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
              <a class="btn btn-primary btn-addUser" href="{{ route('users.create') }}"><i class="fa-solid fa-circle-plus"></i> New User </a>
          </div>
      </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <table id="tbl_user" class="table-hover table table-bordered text-center" style =" top:20px; ">
    <thead>
      <tr id="trhead">
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Image</th>
        <th>Roles</th>
        <th>Gender</th>
        <th width="280px">Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table> 
  </div>
</div>

<script type="text/javascript">
  var table;
  console.log(table);
  $(function () {
    table = $('#tbl_user').DataTable({
      paging: true,
      processing: true,
      serverSide: true,
      responsive: true,
      columnDefs: [ {width: 90, targets:[5, 8 ],className: "text-center"},
				{
				targets: 6,
					render: function(role, type, row, meta) {
						if (role) {
              role = '<label class="badge badge-success role-user">' + role + '</label>'
						} 
						return role;
					}
				}
				// {width: 90, targets:[4, 5, 6],className: "text-center"}	
			],
      ajax: "{{ route('users.index') }}",
      columns: [
        {data: 'first_name', name: 'first_name'},
        {data: 'last_name', name: 'last_name'},
        {data: 'phone', name: 'phone'},
        {data: 'email', name: 'email'},
        {data: 'address', name: 'address'},
        {data: 'staff_img', name: 'image'},
        {data: 'role', name: 'role'},
        {data: 'gender', name: 'gender'},
        {data: 'action', name: 'action', 
          orderable: true,
          searchable: true },
      ]
    });
});
console.log(table);
</script>
@endsection