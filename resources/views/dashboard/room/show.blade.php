@extends('dashboard.layouts.main')

@section('container')

    <table class="table my-5">
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
                <td><button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="bi bi-pencil-square"></i></button></td>
                <td><button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Data"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            @endforeach
        </tbody>
        
    </table>


@endsection