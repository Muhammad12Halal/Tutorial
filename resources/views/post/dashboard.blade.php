@extends('post.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD with Livewire - SOLID</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" style="float: right" href="{{ route('post.create') }}"> Create New Product</a>
                <a class="btn btn-warning" style="color:white" href="{{ route('student.index') }}"> Back</a>
                <a class="btn btn-primary" style="color:white" href="{{ route('email.index') }}"> Send Email Tutorial </a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="margin-top: 10px;">
            <p>{{ $message }}</p>
        </div>
    @endif

    @livewire('post')

@endsection
