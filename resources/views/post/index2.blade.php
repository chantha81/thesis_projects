@extends('admin.layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Static Navigation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="post/create">Create Post</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <table id="tposts" class="table-dark cell-border table-bordered" style="width:100%;">
                    <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>category</th>
                        <th>Author</th>
                        <th>Image</th>
                        <th>Short_desc</th>
                        <th>Description</th>
                    </thead>  
                </table>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function() {
$('#tposts').DataTable({
    
processing: true,
serverSide: true,
ajax: "{{ url('post') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'title', name: 'title' },
{ data: 'categories',name: 'categories.name'},
{ data: 'author', name: 'author' },
{ data:  'image', name: 'image',
   "render": function (data) {
       return '<img src="/img/posts/'+data+'" class="avatar" width="60" height="50"/>';
       },
},
{ data: 'short_desc', name: 'short_desc' },
{ data: 'description', name: 'description'},
],
order: [[0, 'desc']]
});
});
</script>
@endsection