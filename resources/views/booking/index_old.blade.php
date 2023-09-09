@extends('admin.layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class= "header-b"><h5>BOOKED PACKAGE</h5></div>
        <ol class="breadcrumb mb-4 class-action">
            <li class="breadcrumb-item"><a href="booking/create" id="btn-create"><i class="fa fa-plus" aria-hidden="true"></i> New Package</a></li>
        </ol>
    <table id = "tbooked" class="table table-bordered cell-border">
        <thead>
            <tr id="trhead">
                <th>Name</th>
                <th>Phone</th>
                <th>Room</th>
                <th>Accessories</th>
                <th>Date Start</th>
                <th>Date End</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</main>


<script type="text/javascript">
  $(function () {
    var table = $('#tbooked').DataTable({
        paging: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ url('booking') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'rooms', name: 'rooms.room_type'},
            {data: 'accessories', name: 'accessories.name'},
            {data: 'start_d', name: 'start_d'},
            {data: 'end_d', name: 'end_d'},
            {data: 'total_price', name: 'total_prices'},
            {data: 'status', name: 'status'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

  });
</script>
@endsection