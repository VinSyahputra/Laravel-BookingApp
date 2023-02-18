@extends('dashboard.layouts.main')
@section('container')
<div class="card col-md-6 mx-auto my-4 p-4">


    <div class="card-body">
      <h5 class="card-title"><span class="fs-4">Edit </span> User</h5>

      <!-- Floating Labels Form -->
      <form class="row g-2" action="/users/{{ $user->id }}" method="POST">
        @method('put')
        @csrf
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
            <label for="name">Your Name</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="input-group col-md-12">
          <span class="input-group-text">+62</span>
          <div class="form-floating">
            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ $user->contact }}">
            <label for="telp">Telp</label>
            @error('contact')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        
        <div class="form-group mb-2">
          <input type="hidden" class="form-control" id="password" name="password" value="{{ $user->password }}">
          <input type="hidden" value="{{ $default }}" id="defaultpass">
          <button type="reset" class="btn btn-danger mt-3 mb-1 d-block" id="generate">Generate Password</button>

          <small class="text-secondary">Generate new password: <span id="generate_pass"></span></small>
        </div>

        
        <div class="d-flex">
          <button type="submit" class="btn btn-primary ms-auto px-4 py-2">UPDATE</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
</div>

<script>
    let pass = document.querySelector('#password');
    let generate = document.querySelector('#generate');
    let label = document.querySelector('#generate_pass');
    let defaultpass = document.querySelector('#defaultpass');

    generate.addEventListener('click', e => {
        Swal.fire({
          title: 'Are you sure generate new password ?',
          showCancelButton: true,
          confirmButtonText: 'Generate',
        }).then((result) => {
          if (result.isConfirmed) {
            pass.setAttribute('value', defaultpass.value);
            label.textContent = pass.value;
            Swal.fire('Generate password successfully.', '', 'success')
          }
        })
        e.preventDefault();
    });
</script>
@endsection