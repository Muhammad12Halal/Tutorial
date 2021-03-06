@extends('student.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 Example CRUD - SOLID</h2>
            </div>

            <div class="pull-right" style="margin-top: 40px;">
                <a class="btn btn-success" href="{{ route('student.create') }}"> Create New Product</a>
                <br>
                <a class="btn btn-primary btn-sm" style="margin-top:10px;margin-bottom:10px;" href="{{ route('post.index') }}"> Livewire CRUD</a>
                <a class="btn btn-warning btn-sm" style="margin-top:10px;margin-bottom:10px;" href="{{ route('open.index') }}"> Back Open Closed</a>
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
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->student_ID }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <form action="{{ route('student.destroy',$student->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('student.show',$student->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('student.edit',$student->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
