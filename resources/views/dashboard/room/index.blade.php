@extends('dashboard.layouts.main')

@section('container')

    <div class="col-md-8">
        @if (session()->has('create'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Room has been created',
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
                title: 'Room has been updated',
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
                title: 'Room has been deleted',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        @endif
        <a href="/rooms/create" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Room"><i class="bi bi-plus"></i> Room</a>
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
                    <td>
                        <a href="/rooms/{{ $room->id }}/edit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="bi bi-pencil-square"></i></a>
                        <form action="/rooms/{{ $room->id }}" method="post" class="d-inline form-delete">
                            @method('delete')
                            @csrf
                            <button onclick="return false" class="btn btn-danger btn-delete" data-id="{{ $room->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Data"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{ $rooms->links() }}
    </div>

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