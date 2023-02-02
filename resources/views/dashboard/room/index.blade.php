@extends('dashboard.layouts.main')

@section('container')

    <div class="col-md-8">
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="row">No</th>
                    <td>Name</td>
                    <td>Slug</td>
                    <td>Created at</td>
                    <td>Updated at</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->slug }}</td>
                    <td>{{ $room->created_at }}</td>
                    <td>{{ $room->updated_at }}</td>
                    <td><button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="bi bi-pencil-square"></i></button></td>
                    <td><button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Data"><i class="bi bi-trash-fill"></i></button></td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>


@endsection