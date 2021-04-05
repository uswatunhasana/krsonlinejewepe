@extends('layouts.app')
@section('title', 'Rincian KRS')
@section('content')
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body"> </div>
      </div>
</div>

<div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
          <div class="card-header">
            <div class="row align-items-center py-0">
              <div class="col-lg-6 col-7">
                <h6 class="h2 d-inline-block mb-0">Data User Mahasiswa</h6>
              </div>
              <h2>Biodata Mahasiswa</h2>
                        @foreach($mahasiswas as $mahasiswa)
                        @if($mahasiswa->user_id == Auth::user()->id )
                        <table class="table-payment-1">
                            <tr>
                            <td class="text-left">NPM</td>
                            <td class="text-left">: {{ $mahasiswa->npm}}</td>
                            </tr>
                            <tr>
                            <td class="text-left">Nama</td>
                            <td class="text-left">: {{ auth()->user()->name}}</td>
                            </tr>
                            <tr>
                            <td class="text-left">Kelas</td>
                            <td class="text-left">: {{ $mahasiswa->kelas}}</td>
                            </tr>
                            <tr>
                            <td class="text-left">Semester</td>
                            <td class="text-left">: {{ $mahasiswa->semester}}</td>
                            </tr>
                            <tr>
                            <td class="text-left">Jurusan</td>
                            <td class="text-left">: {{ $mahasiswa->jurusan->nama_jurusan }}</td>
                            </tr>
                            <tr>
                            <td class="text-left">Fakultas</td>
                            <td class="text-left">: {{ $mahasiswa->fakultas->nama_fakultas }}</td>
                            </tr>
                            <input name="mahasiswa_id" hidden="" value="{{ $mahasiswa->id }}" ></td>
                          @endif
                          @endforeach
                        </table>
            </div>
          </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th width="20px">No</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Jenis</th>
                    <th>Jumlah SKS</th>
                    <th>Semester</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach($krss as $krs)
                <tr>
                  <td width="40px">{{ $no++ }}</td>
                  <td><h5 class="mb-0" >{{ $krs->matakuliah->nama_mk }}</h5>
                      <span class="text-uppercase text-muted font-weight-bold">{{ $krs->matakuliah->kode_mk }}</span>
                  <td>{{ $krs->matakuliah->jenis }}</td>
                  <td>{{ $krs->matakuliah->sks }}</td>
                  <td>{{ $krs->matakuliah->semester }}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
          </div>      
        </div>
      </div>
    </div>
    </div>

<!-- Modal  Add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title mb-0" id="addModalLabel">Tambah Data User Mahasiswa</h5>
                </div>
              <div class="modal-body">
                 <!-- Card body -->
                <form role="form" action="{{ route('user.create') }}" method="POST">
                  @csrf
                  @method('POST')
                    <!-- Input groups with icon -->
                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label form-control-label">Nama<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="name" placeholder="Masukkan Nama Lengkap" id="name" name="name" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-md-2 col-form-label form-control-label">Username<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" placeholder="Masukkan username" id="username" name="username" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-md-2 col-form-label form-control-label">Password<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                      <div class="input-group input-group-merge" id="show_hide_password">   
                            <input class="form-control" type="password" placeholder="password" id="password" name="password" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <div class="input-group-append">
                                <span class="input-group-text"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                      </div>
                    </div>  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
         </div>
       </div>
    </div>

     <!-- Modal  edit -->
     @foreach($users as $user)
     <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title mb-0" id="editModalLabel">Update Data User Mahasiswa</h5>
                </div>
              <div class="modal-body">
                 <!-- Card body -->
                <form role="form" action="{{ route('user.update', $user->id) }}" method="POST" id="editForm">
                  @csrf
                  @method('PUT')
                    <!-- Input groups with icon -->
                    <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label form-control-label">Nama<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $user->name }}" id="name" name="name" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-md-2 col-form-label form-control-label">Username<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $user->username }}" id="username" name="username" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="updatepassword" class="col-md-2 col-form-label form-control-label">Password<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                      <div class="input-group input-group-merge" id="show_hide_password">   
                            <input class="form-control" type="password" value="******" id="updatepassword" name="updatepassword" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <div class="input-group-append">
                                <span class="input-group-text"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                      </div>
                    </div> 
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
            </form>
         </div>
       </div>
    </div>
    @endforeach
    @include('layouts.footers.auth')  
    @endsection  
    
@endsection