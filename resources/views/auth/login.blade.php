@extends('auth.layout')
@section('content')
<div class="container login-form">
    @if(Session::has('success'))
    <div class="alert alert-success"><em>{!! session('success') !!}</em>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
    </div>
    @endif
    @if(Session::has('errors'))
    <div class="alert alert-danger"><em>{!! $errors->first() !!}</em>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
    </div>
    @endif
        
    <form action="{{ route('login') }}" method="POST">

    <img id="logo" src="./assets/img/login-logo.jpg" alt="" width="150px" hight="150px">
        @csrf
        <div class="form-group row">
            <div class="col-md-12">
                <input type="text" id="email_address" class="form-control"  placeholder="Email" name="email" required autofocus>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-8 offset-md-4 btn-login">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
        <div class="row mb-4">
            <div class="justify-content-center forget-pw">
                <a href="#!">Forgot password?</a>
            </div>
        </div>
    </form>
</div>
@endsection


