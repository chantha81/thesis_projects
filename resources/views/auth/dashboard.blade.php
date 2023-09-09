@extends('auth.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p>You are Logged In </p>
                    <p>User ID: {{$user->id}}</p>
                    <p>User Name: {{$user->name}}</p>
                    <p>User Email: {{$user->email}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
