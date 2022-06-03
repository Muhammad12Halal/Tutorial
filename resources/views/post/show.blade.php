@extends('post.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show User for Post Tutorial</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" style="float:right;" href="{{ route('post.index') }}"> Back</a>
                <a class="btn btn-primary" href="{{ route('post.edit', $post->id)}}"> Edit Person</a>
            </div>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $post->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student ID:</strong>
                {{ $post->studentID }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $post->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IC number:</strong>
                {{ $post->ic }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $post->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <a target="_blank" href="{{ asset('images/activity/'.$post->image)}}" style="width: 150px; height: 150px;">
                    <img src="{{ asset('images/activity/'.$post->image) }}" class="img-thumbnail" width="100px" height="50px"></a>

            </div>
        </div>
    </div>
@endsection
