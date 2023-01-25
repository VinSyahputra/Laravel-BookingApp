@extends('layouts.main')
@section('container')    

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

      <div class="d-flex justify-content-center py-4">
        <a href="/" class="logo d-flex align-items-center w-auto">
          <span class="d-none d-lg-block">BookingRoom</span>
        </a>
      </div><!-- End Logo -->

      <div class="card mb-3">

        <div class="card-body">

          <div class="pt-4 pb-2 mb-3">
            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
          </div>

          <form action="/login" method="post" class="row g-3 needs-validation">
            @csrf
            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username" required>
              <div class="invalid-feedback">Please enter your Username!</div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" required>
              <div class="invalid-feedback">Please enter your password!</div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="true" id="checkShow">
                <label class="form-check-label" for="checkShow"><i class="bi bi-eye-slash" id="iconCheck"></i></label>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
            <div class="col-12">
              <p class="small mb-0">Don't have account? <a href="/register">Create an account</a></p>
            </div>
          </form>

        </div>
      </div>


    </div>
  </div>
</div>

<script>
  let show = document.querySelector('#checkShow');
  let pass = document.querySelector('#password');
  let icon = document.querySelector('#iconCheck');

  show.addEventListener('click', e=>{
    if(pass.type == 'password'){
      pass.setAttribute('type', 'text');
      icon.setAttribute('class', 'bi-eye');
    }else{
      pass.setAttribute('type', 'password');
      icon.setAttribute('class', 'bi-eye-slash');
    }
  });
</script>
@endsection
