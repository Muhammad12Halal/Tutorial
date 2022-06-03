<div>

    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th colspan="7">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlSName" placeholder="Search" wire:model="search">
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Student ID</th>
                <th>Phone</th>
                <th>Ic Number</th>
                <th>Email</th>
                <th width="200px">Image</th>
                <th width="250px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{ ($datas ->currentpage()-1) * $datas ->perpage() + $loop->index + 1 }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->studentID }}</td>
                <td>{{ $data->phone }}</td>
                <td>{{ $data->ic }}</td>
                <td>{{ $data->email }}</td>
                <td><a target="_blank" href="{{ asset('images/'.$data->image)}}" style="width: 150px; height: 150px;">
                    <img src="{{ asset('images/'.$data->image) }}" class="img-thumbnail" width="100px" height="50px"></a></td>
                <td>
                    <form action="{{ route('post.destroy',$data->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('post.show',$data->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('post.edit',$data->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $datas->links() }}
    </div>
</div>
