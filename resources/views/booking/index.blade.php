@extends('admin.layout')
@section('content')
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Appointments</h4>
                                <a href="add-booking.html" class="btn btn-primary float-right veiwbutton ">Add Booking</a>
                            </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table id= "tbooked" class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr id="trhead">
												<th>Booking Code</th>
												<th>Name</th>
												<th>Ph.Number</th>
												<th>Arrival Date</th>
												<th>Depature Date</th>
												<th>Room</th>
												<th>Tent</th>
												<th>Email</th>
												<th>Total Price</th>
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
		var table = $('#tbooked').DataTable({
			paging: true,
			processing: true,
			serverSide: true,
			// responsive: true,
			columnDefs: [
				{targets: [3, 4],
            	render: DataTable.render.datetime('Do MMM YYYY')}
			],
			// $(row).find('td:eq(2)').css('background-color', 'red');
			ajax: "{{ url('all_booking') }}",
			columns: [
				{data: 'booking_code', name: 'booking_code'},
				// {data: 'name', name: 'name'},
				{data: 'name', name: 'name'},
				{data: 'phone', name: 'phone'},
				{data: 'arrival_date', name: 'arrival_date'},
				{data: 'depature_date', name: 'depature_date'},
				{data: 'rooms', name: 'room_id.room_name'},
				{data: 'tent_id', name: 'tent_id'},
				{data: 'email', name: 'email'},
				{data: 'total_price', name: 'total_price'},
				{data: 'status', name: 'status' 
					// "render": function (data) {
					// 	return 'style = "background-color:red;"';
					// },
				},
				{data: 'action', name: 'action', 
                    orderable: true, 
                    searchable: true 
                },
			]
		});
	});
</script>
@endsection