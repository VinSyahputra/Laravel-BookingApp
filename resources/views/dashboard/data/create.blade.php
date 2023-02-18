@extends('dashboard.layouts.main')
@section('container')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<div class="card col-md-6 mx-auto my-4 p-4">

    <div class="card-body">
      <h5 class="card-title"><span class="fs-4">Input </span> Data</h5>

      <!-- Floating Labels Form -->
      <form class="row g-2" action="/data/{{ $slug }}" method="POST">
        @csrf
        <input type="hidden" name="room_id" value="{{ $slug }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('room_owner') is-invalid @enderror" id="room_owner" name="room_owner" placeholder="Room Owner">
            <label for="room_owner">Room Owner</label>
            @error('room_owner')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="Contact">
            <label for="contact">Contact</label>
            @error('contact')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name" name="event_name" placeholder="Event Name">
            <label for="event_name">Event Name</label>
            @error('event_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="Date">
            <label for="date">Date</label>
            @error('date')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control timepicker @error('time_start') is-invalid @enderror" id="time_start" name="time_start" placeholder="Time start">
            <label for="time_start">Time start</label>
            @error('time_start')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control timepicker @error('time_end') is-invalid @enderror" id="time_end" name="time_end" placeholder="Time end">
            <label for="time_end">Time end</label>
            @error('time_end')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description">
            <label for="description">Description</label>
            @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="d-flex mt-3">
          <button type="submit" class="btn btn-primary ms-auto px-4 py-2">INPUT</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
$(function() {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        // or instead:
        // var maxDate = dtToday.toISOString().substr(0, 10);

        $('#date').attr('min', maxDate);
    });

    $(document).ready(function() {
        $('input.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 30,
            dynamic: true,
        });
    });
</script>
@endsection