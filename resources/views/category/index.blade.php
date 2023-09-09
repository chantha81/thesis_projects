@extends('admin.layout')
@section('content')

<main>
	<div class="container-fluid">
		<h1 class="mt-4">Category</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.html">View All Category </a></li>
			<li class="breadcrumb-item active"><a href="category/create">Create category</a></li>
		</ol>
		@if (count($categories) > 0)
		<div class="panel panel-default">
			<div class="panel-heading">
				All Category
			</div>
		<div class="panel-body">
		<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Category</th>
						<th>Room No</th>
						<th>Actions</th>
					</tr>
					<!-- <th>&nbsp;</th> -->
				</thead>

				<tbody>
					@foreach ($categories as $category)
					<tr>
						<td>
							<div>{!! $category->id !!}</div>
						</td>
						<td>
							<div>{!! $category->name !!}</div>
							<!-- <div>{!! $category->description !!}</div> -->
						</td>
						<td>
							<div>{!! $category->room_no !!}</div>
						</td>					
						<td>
						<a href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a>
							{!! Form::open(array('url'=>'category/'. $category->id, 'method'=>'DELETE')) !!}
							{!! csrf_field() !!}
							{!! method_field('DELETE') !!}
								<button class="btn btn-danger">Delete</button>
							{!! Form::close() !!}
						</td>
						</tr>					 
					@endforeach
				</tbody>
			</table>
		</div>
@endif
	</div>
</main>
@endsection