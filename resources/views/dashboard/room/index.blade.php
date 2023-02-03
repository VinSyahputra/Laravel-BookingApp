@extends('dashboard.layouts.main')

@section('container')

    <div class="col-md-8">
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="row">No</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->slug }}</td>
                    <td>{{ $room->created_at->format('d-M-Y') }}</td>
                    <td>{{ $room->updated_at->format('d-M-Y') }}</td>
                    <td><button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="bi bi-pencil-square"></i></button></td>
                    <td><button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Data"><i class="bi bi-trash-fill"></i></button></td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{ $rooms->links() }}
    </div>


@endsection