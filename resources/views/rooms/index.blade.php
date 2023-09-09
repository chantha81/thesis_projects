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
							<table style="width: 100%;" id="table_room" class="table table-striped table-bordered row-border">
								<thead>
									<tr id="trhead">
										<th>Room Number</th>
										<th>Name</th>
										<th>Bed</th>
										<th>Price</th>
										<th>Image</th>
										<th>Status</th>
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
	$(function () {
		var table = $('#table_room').DataTable({
			paging: true,
			processing: true,
			serverSide: true,
			responsive: true,
			columnDefs: [
				{ width: 40, targets: 4 },
				{ width: 60, targets: 6 }
			],
			ajax: "{{ route('rooms.list') }}",
			columns: [
				{data: 'room_number', name: 'room_number'},
				{data: 'room_name', name: 'room_name'},
				{data: 'bed', name: 'bed'},
				{data: 'price', name: 'price'},
				{data: 'image', name: 'image'},
				{data: 'status', name: 'status'},
				{data: 'action', name: 'action', orderable: true, searchable: true },
			]
		});
	});
</script>
@endsection	
