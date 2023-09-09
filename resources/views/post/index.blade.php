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
                @if(Session::has('post_update'))
                <div class="alert alert-success"><em>{!! session('post_update') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
                </div>
                @endif
                @if(Session::has('post_delete'))
                <div class="alert alert-success"><em>{!! session('post_delete') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
                </div>
                @endif
                @if (count($posts) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Posts
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Description</th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <div>{!! $post->title !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $post->author !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $post->category_id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! Html::image("/img/posts/".$post->image, $post->title, array('width'=>'60')) !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $post->short_desc !!}</div>
                                    </td>

                                    <td><a class="btn btn-primary" href="{!! url('post/' . $post->id . '/edit') !!}">Edit</a></td>

                                    <td>
                                        {!! Form::open(array('url'=>'post/'. $post->id, 'method'=>'DELETE')) !!}
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
                </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection