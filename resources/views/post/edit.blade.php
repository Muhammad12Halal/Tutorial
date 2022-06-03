@extends('post.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Data</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" style="float:right;" href="{{ route('post.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

<form action="{{ route('post.update', $post->id) }}" method="POST">
    @method('PUT')
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $post->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student ID:</strong>
                <input type="text" name="studentID" class="form-control" placeholder="Student ID" value="{{ $post->studentID }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $post->phone }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ic Number:</strong>
                <input type="text" name="ic" class="form-control" placeholder="Ic Number" value="{{ $post->ic }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $post->email }}">
            </div>
        </div>
        <div class="col-xs-12 col-md-12 mb-3">
            <div class="form-group">
                <label for="image">Upload Picture:</label>
                <br>
                <img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->image }}" width="300px" height="300px">
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>

</form>
@endsection
