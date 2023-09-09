@extends('admin.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('post_create'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('post_create') !!}
                </div>
                @endif
                    @if (count($errors) > 0)
                    <!-- Form Error List -->
                    <div class="alert alert-danger">
                        <strong>Something is Wrong</strong>
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- It Create the new Category -->

                    {!! Form::open(array('url'=>'post', 'files'=>'true')) !!}

                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id',$categories,null ,array('class'=>'form-select')) !!}
                    <br>
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title',null, array('class'=>'form-control')) !!}

                    {!! Form::label('author', 'Author:') !!}
                    {!! Form::text('author',null, array('class'=>'form-control')) !!}

                    {!! Form::label('image', 'Image:') !!}
                    {!! Form::file('image', array('class'=>'form-control')) !!}
                    <br>
                    {!! Form::label('short_desc', 'Short Desc:') !!}
                    {!! Form::text('short_desc',null, array('class'=>'form-control')) !!}

                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description',null, array('class'=>'form-control')) !!}
                    <br>    
                    {!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

                    <a class="btn btn-primary" href="{!! url('/post')!!}">Back</a>

                    {!! Form::close() !!}
                
            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>
@endsection