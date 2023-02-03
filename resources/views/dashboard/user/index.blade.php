@extends('dashboard.layouts.main')
@section('container')
<div class="col-md-9">
    <a href="/users/create" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add User"><i class="bi bi-plus"></i> User</a>
    <table class="table my-5">
        <thead>
            <tr>
                <th scope="row">No</th>
                <th>ID User</th>
                <th>Name</th>
                <th>Username</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->contact }}</td>
                <td><button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="bi bi-pencil-square"></i></button></td>
                <td><button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Data"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>    
@endsection