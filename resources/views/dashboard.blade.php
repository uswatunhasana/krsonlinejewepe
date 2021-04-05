@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="header bg-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
            @php
            $jumlah_matakuliah = \App\Models\Matakuliah::count();
            $jumlah_mahasiswa = \App\Models\Mahasiswa::count();
            @endphp
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase text-muted mb-0">Selamat Datang !</h4>
                                    <span class="h2 font-weight-bold mb-0">{{ Auth::user()->name }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->role == "user")  
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-icon btn-primary" type="button" href="{{ route('isikrs') }}>
                                        <span class="btn-inner--icon"></span>
                                        <span class="btn-inner--text">ISI KRS SEKARANG</span>
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (Auth::user()->role == "admin")
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Mahasiswa </h5>
                                <span class="h2 font-weight-bold mb-0">{{ $jumlah_mahasiswa }} Orang</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Mata Kuliah</h5>
                                    <span class="h2 font-weight-bold mb-0"> {{ $jumlah_matakuliah }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

        @include('layouts.footers.auth')
@endsection

