@extends('admin.layout')
@section('content')
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<div class="mt-5">
						<h4 class="card-title float-left mt-2">All Rooms</h4> <a href="/room_create" class="btn btn-primary float-right veiwbutton">Add Room</a> </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card card-table">
					<div class="card-body booking_card">
						<div class="table-responsive">
							<table style="width: 100%;" id="table_room" class="datatable table table-stripped table-hover table-center table-bordered">
								<thead>
									<tr id="trhead">
										<th>Room Name</th>
										<th>Type</th>
										<th>Bed</th>
										<th>Price</th>
										<th>Image</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var table;
	$(function () {
		table = $('#table_room').DataTable({
			paging: true,
			processing: true,
			serverSide: true,
			responsive: true,
			columnDefs: [
				{ width: 40, targets: 4 },
				{ width: 40, targets: 5 },
				{targets: [0,1,2,3,4,5], className: "text-center"}
			],
			ajax: "{{ route('rooms.index') }}",
			columns: [
				{data: 'name', name: 'name'},
				{data: 'type', name: 'type'},
				{data: 'bed', name: 'bed'},
				{data: 'price', name: 'price', render: $.fn.dataTable.render.number( ',', '.', 2,'$')},
				{data: 'image', name: 'image',
					"render": function (data) {
                    return '<img src="/img/room/'+ data +'" width="60" height="50"/>';
                    },
				},
				{data: 'action', name: 'action', orderable: true, searchable: true },
			]
		});
	});
</script>
@endsection	