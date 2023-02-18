@extends('dashboard.layouts.main')
@section('container')
<div class="card col-md-6 mx-auto my-4 p-4">

    <div class="card-body">
      <h5 class="card-title"><span class="fs-4">Edit </span> Room</h5>

      <!-- Floating Labels Form -->
      <form class="row g-2" action="/rooms/{{ $room->id }}" method="POST">
        @method('put')
        @csrf
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Room Name" value="{{ $room->name }}">
            <label for="name">Room Name</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Slug" value="{{ $room->slug }}" readonly>
            <label for="slug">Slug</label>
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="d-flex">
          <button type="submit" class="btn btn-primary ms-auto px-4 py-2">UPDATE</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
</div>
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/rooms/checkSlug?name=' + name.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
    });

</script>
@endsection