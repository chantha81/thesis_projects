@extends('admin.layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class= "header-b"><h3>ACCESSORIES</h3></div>
        <ol class="breadcrumb mb-4 class-action" style="margin-bottom:10px !important;">
            <li class="breadcrumb-item"><a href="accessories/create" id="btn-create"><i class="fa fa-plus" aria-hidden="true"></i> Accessories</a></li>
        </ol>
    <table id = "taccess" class="table table-striped table-bordered cell-border" >
        <thead>
            <tr id="trhead">
                <th>code</th>
                <th>Accessories</th>
                <th>Image</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Price</th>
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
    $(document).ready(function(){
        $('#taccess').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('accessories.index') }}",
        columns: [
            {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image',
                "render": function (data) {
            return '<img src="/img/accessories/'+data+'" class="avatar" width="60" height="50"/>';
            },},
            {data: 'type', name: 'type'},
            {data: 'duration', name: 'duration',
                "render": function (data) {
            return  data +' ' + 'Day';
            },
            },
            {data: 'price', name: 'price'},
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