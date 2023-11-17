@extends('admin.layout')
@section('content')
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">All Booking</h4>
                                <a href="{{url('create_booking')}}" class="btn btn-primary float-right veiwbutton ">Add Booking</a>
                            </div>
						</div>
					</div>
					@if(Session::has('package_delete'))
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong></strong>{!! session('package_delete') !!}
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table id= "tbooked" class="datatable table table-stripped table-hover table-center table-bordered">
										<thead>
											<tr id="trhead">
												{{-- <th>Booking Code</th> --}}
												<th>Name</th>
												<th>Phone</th>
												<th>Check In Date</th>
												<th>Check Out Date</th>
												<th>Book Advance</th>
												<th>Total</th>
												<th>Unpaid</th>
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
    var table ;
	$(function () {
		 table = $('#tbooked').DataTable({
			paging: true,
			processing: true,
			serverSide: true,
			columnDefs: [
				{targets: [2, 3], render: DataTable.render.datetime('Do MMM YYYY')},
				{targets: [0,1,2,3,7], className: "text-center", width: "15%"},
				{
				targets: 7,
					render: function(status, type, row, meta) {
						if (status == 'Pending') {
						status = '<td><span class="pending status">' + status + '</span></td>'
						} else if (status == 'Confirmed') {
						status = '<td><span class="approved status">' + status + '</span></td>'
						} else if (status == 'Reject') {
						status = '<td><span class="rejected status">' + status + '</span></td>'
						} else if (status == 'Success') {
						status = '<td><span class="success status">' + status + '</span></td>'
						}
						return status;
					}
				},
				{width: 90, targets:[4, 5, 6],className: "text-center"}	
			],
			ajax: "{{ url('all_booking') }}",
			columns: [
				{data: 'name', name: 'name'},
				{data: 'phone', name: 'phone'},
				{data: 'check_in_date', name: 'check_in_date'},
				{data: 'check_out_date', name: 'check_out_date'},
				{data: 'book_advance', name: 'book_advance',render: $.fn.dataTable.render.number( ',', '.', 2 ,'$')},
				{data: 'total_price', name: 'total_price',render: $.fn.dataTable.render.number( ',', '.', 2,'$')},
				{data: 'balance', name: 'balance',render: $.fn.dataTable.render.number( ',', '.', 2,'$')},
				{data: 'status', name: 'status'},
				{data: 'action', name: 'action', 
                    orderable: true, 
                    searchable: true 
                },
			]
		});
	});
</script>
@endsection