@extends('post.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD - SOLID</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('post.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Phone</th>
            <th>Ic</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->name }}</td>
            <td>{{ $student->studentID }}</td>
            <td>{{ $post->phone }}</td>
            <td>{{ $post->ic }}</td>
            <td>{{ $post->email }}</td>
            <td>
                <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('post.show',$post->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('post.edit',$post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection

