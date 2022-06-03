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

                    {{ Auth::user()->name }}
                    You are Logged In
                    <a class="btn btn-danger" href="{{ route('logout') }}"> Logout</a>
                    <a class="btn btn-primary" href="{{ route('open.index')}}"> Open Closed Tutorial</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
