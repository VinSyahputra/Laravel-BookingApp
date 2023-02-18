@extends('dashboard.layouts.main')

@section('container')
<h2 class="mb-3">{{ $name }}</h2>
    <table class="table my-2">
        @if (session()->has('create'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Data has been created',
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
                title: 'Data has been deleted',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        @endif
        
        <a href="/data/{{ $slug }}/create" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Data"><i class="bi bi-plus"></i> Data</a>
        <thead>
            <tr>
                <th scope="row">No</th>
                <td>Date</td>
                <td>User Booking</td>
                <td>Room Owner</td>
                <td>Contact</td>
                <td>Event Name</td>
                <td>Time</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->date }}</td>
                <td>{{ $d->user->name }}</td>
                <td>{{ $d->room_owner}}</td>
                <td>{{ $d->contact }}</td>
                <td>{{ $d->event_name }}</td>
                <td>{{ $d->time_start .' - '. $d->time_end }}</td>
                <td>{{ $d->description }}</td>
                <td class="d-flex gap-1">
                    <a href="" class="btn btn-warning " data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="bi bi-pencil-square"></i></a>
                    <form action="/data/{{ $d->id }}" method="post" class="d-inline form-delete">
                        @method('delete')
                        @csrf
                        <button onclick="return false" class="btn btn-danger btn-delete" data-id="{{ $d->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Data"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    {{ $data->links() }}

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