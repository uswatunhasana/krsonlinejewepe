@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label form-control-label">Nama<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="nama" placeholder="Masukkan Nama Lengkap" id="name" name="name" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-md-2 col-form-label form-control-label">Username<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" placeholder="Masukkan username" id="username" name="username" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-md-2 col-form-label form-control-label">Email<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="email" placeholder="masukkan Email" id="email" name="email" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="alamat" class="col-md-2 col-form-label form-control-label">Alamat<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="textarea" placeholder="Masukkan Alamat" id="alamat" name="alamat" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="no_telp" class="col-md-2 col-form-label form-control-label">No.Telp<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" placeholder="083XXXXXXXXX" id="no_telp" name="no_telp" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
