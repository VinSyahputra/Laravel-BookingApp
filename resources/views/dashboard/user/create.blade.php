@extends('dashboard.layouts.main')
@section('container')
<div class="card col-md-6 mx-auto my-4 p-4">

  {{-- @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif --}}

    <div class="card-body">
      <h5 class="card-title"><span class="fs-4">Create </span> User Account</h5>

      <!-- Floating Labels Form -->
      <form class="row g-2" action="/users" method="POST">
        @csrf
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name">
            <label for="name">Your Name</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Your Name">
            <label for="username">Username</label>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
              <label for="password">Password</label>
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            </div>
          </div>
        <div class="col-md-12">
          <div class="form-floating">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
            <label for="confirmpPassword">Confirm Password</label>
          </div>
        </div>
        <small class="text-secondary">Password match : <span id="labelMatch"></span></small>
        <div class="col-md-6">
          <select id="inputState" class="form-select @error('is_admin') is-invalid @enderror" name="is_admin">
            <option value="" selected>Role</option>
            <option value="1">admin</option>
            <option value="0">user</option>
          </select>
          @error('is_admin')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        <div class="input-group col-md-12 mb-2">
          <span class="input-group-text">+62</span>
           <div class="form-floating">
              <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="Your Name">
              <label for="telp">Telp</label>
              @error('contact')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
        </div>

        
        <div class="d-flex">
          <button type="submit" class="btn btn-primary ms-auto px-4 py-2">CREATE</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
</div>

<script>
    let pass = document.querySelector('#password');
    let confpass = document.querySelector('#password_confirmation');
    let label = document.querySelector('#labelMatch');

    pass.addEventListener('keyup', e=>{
        if(confpass.value != ''){
            if(pass.value == confpass.value){
                label.textContent = 'match';
                label.setAttribute('class', 'text-success');
            }else{
                label.textContent = 'not match';
                label.setAttribute('class', 'text-danger');
            }
        }
        e.preventDefault();
    });
    confpass.addEventListener('keyup', e=>{
        if(pass.value != ''){
            if(pass.value == confpass.value){
                label.textContent = 'match';
                label.setAttribute('class', 'text-success');
            }else{
                label.textContent = 'not match';
                label.setAttribute('class', 'text-danger');
            }
        }
        e.preventDefault();
    });
</script>
@endsection