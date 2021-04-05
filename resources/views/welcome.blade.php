@extends('layouts.app', ['class' => 'bg-default'])
@section('css')
<link rel="stylesheet" href="{{ asset('css') }}/login/style.css" type="text/css">
<style type="text/css">
		.img-fluid {
  max-width: 80%;
  height: auto;
}
	</style>
@endsection
@section('content')
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="{{ asset('assets/img/brand/gambar.png') }}" class="card-img-top mb-0" alt="User Image"></div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="row mt-6 text-center"><img src="{{ asset('assets/img/brand/login1.png') }}"  class="img-fluid ml-6" alt="Responsive image"> </div>
                <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="text-center"><b>Login Akun</b></h2>
                <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }} card2 card border-0 px-4 py-5">
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Username</h6>
                        </label>  <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="{{ __('username') }}" type="username" name="username" value="{{ old('username') }}" required autofocus> </div>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                             </span>
                        @endif                       
                    <div class=" form-group{{ $errors->has('password') ? ' has-danger' : '' }} row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="secret" required></div>
                     @if ($errors->has('password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                     @endif
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
            </div>
        </div>
        <div class="bg-blue py-4">
        </div>
    </div>
</div>
@endsection
