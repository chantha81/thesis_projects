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
									<table id= "tbooked" class="datatable table table-stripped table table-hover table-center table-bordered">
										<thead>
											<tr id="trhead">
												{{-- <th>Booking Code</th> --}}
												<th>Name</th>
												<th>Phone</th>
												<th>Check In Date</th>
												<th>Check Out Date</th>
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
			columnDefs: [
				{targets: [2, 3], render: DataTable.render.datetime('Do MMM YYYY')},
				{targets: 0, className: "text-center", width: "15%"}
			],
			ajax: "{{ url('all_booking') }}",
			columns: [
				// {data: 'booking_code', name: 'booking_code'},
				{data: 'name', name: 'name'},
				{data: 'phone', name: 'phone'},
				{data: 'check_in_date', name: 'check_in_date'},
				{data: 'check_out_date', name: 'check_out_date'},
				{data: 'total_price', name: 'total_price'},
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