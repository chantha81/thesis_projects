@extends('admin.layout')
@section('content')
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<div class="mt-5">
						<h4 class="card-title float-left mt-2">All Tent</h4> <a href="{{route('tents.create')}}" class="btn btn-primary float-right veiwbutton">Add Tent</a> </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card card-table">
					<div class="card-body booking_card">
						<div class="table-responsive">
							<table style="width: 100%;" id="table_tent" class="table table-striped table-bordered row-border">
								<thead>
									<tr id="trhead">
										<th>Name</th>
										<th>Type</th>
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
	$(function () {
		var table = $('#table_tent').DataTable({
			paging: true,
			processing: true,
			serverSide: true,
			responsive: true,
			columnDefs: [
                { width: 100, targets: 3 ,className: "text-center" },
				{ width: 60, targets: 4 },
                {targets: 0, className: "text-center", width: "15%"}
                // {targets: 3, className: "text-center"}
			],
			ajax: "{{ route('tents.index') }}",
			columns: [
				{data: 'name', name: 'name'},
				{data: 'type', name: 'type'},
				{data: 'price', name: 'price'},
                {data: 'image', name: 'image',
                    "render": function (data) {
                    return '<img src="/img/tent/'+ data +'" width="60" height="50"/>';
                    },
                },
				{data: 'action', name: 'action', orderable: true, searchable: true },
			]
		});
	});
</script>
@endsection	
