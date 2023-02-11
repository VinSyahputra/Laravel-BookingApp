@extends('dashboard.layouts.main')
@section('container')
<div class="col-md-10">
    @if (session()->has('create'))
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'User account has been created',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
    @if (session()->has('update'))
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'User account has been updated',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
    @if (session()->has('delete'))
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: 'User account has been deleted',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
    
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
                <td>
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="bi bi-pencil-square"></i></a>
                    <form action="/users/{{ $user->id }}" method="post" class="d-inline form-delete">
                        @method('delete')
                        @csrf
                        <button onclick="return false" class="btn btn-danger btn-delete" data-id="{{ $user->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Data"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>    
{{-- <script>

    let btnDelete = document.querySelectorAll('.btn-delete');
    let formDelete = document.querySelectorAll('.form-delete');
    btnDelete.forEach(each=>{
        each.addEventListener('click', e=>{
            e.preventDefault();
            let id = each.getAttribute("data-id");
                Swal.fire({
                    title: 'Are you sure ?',
                    text: "You won't be able to revert this !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        formDelete.submit();
                    }
                })
        })
    })
    console.log(formDelete.length);
</script> --}}

<script>
    let btnDelete = document.querySelectorAll('.btn-delete');
    let formDelete = document.querySelectorAll('.form-delete');

    for(let i = 0; i < formDelete.length; i++){
        btnDelete[i].addEventListener('click', e=>{
            e.preventDefault();
            let id = btnDelete[i].getAttribute("data-id");
            Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    formDelete[i].submit();
                }
            })
        });
    }
</script>
@endsection