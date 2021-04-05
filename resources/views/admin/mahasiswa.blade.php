@extends('layouts.app')
@section('title', 'Data Mahasiswa')
@section('content')
<!-- Tampilan Data Mahasiswa -->
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
                <h6 class="h2 d-inline-block mb-0">Data Mahasiswa</h6>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#addModal">
                  <span class="btn-inner--icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                  <span class="btn-inner--text">Tambah Data</span>
                </button>
              </div>
            </div>
          </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th width="20px">No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Jurusan</th>
                    <th>Fakultas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th width="20px">No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Jurusan</th>
                    <th>Fakultas</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach($mahasiswas as $mahasiswa)
                <tr>
                  <td width="40px">{{ $no++ }}</td>
                  <td>{{ $mahasiswa->npm}}</td>
                  <td>{{ $mahasiswa->user->name }}</td>
                  <td>{{ $mahasiswa->kelas}}</td>
                  <td>{{ $mahasiswa->semester}}</td>
                  <td>{{ $mahasiswa->jurusan->nama_jurusan }}</td>
                  <td>{{ $mahasiswa->fakultas->singkatan }}</td>
                  <td>
                    <button data-toggle="modal" data-target="#editModal-{{ $mahasiswa->id }}" class="btn btn-sm btn-primary"data-tooltip="tooltip" data-placement="bottom" title="edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger" type="button" data-tooltip="tooltip" data-placement="bottom" title="hapus" id="{{ $mahasiswa->id }}" onclick="deletemahasiswa(this.id)"> <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $mahasiswa->id }}" action="{{ route('mahasiswa.delete',$mahasiswa->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
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
                  <h5 class="modal-title mb-0" id="addModalLabel">Tambah Data Mahasiswa</h5>
                </div>
              <div class="modal-body">
                 <!-- Card body -->
                <form role="form" action="{{ route('mahasiswa.create') }}" method="POST">
                  @csrf
                  @method('POST')
                    <!-- Input groups with icon -->
                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label form-control-label">Nama<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                      <select class="form-control" name="user_id" id="user_id" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        <option disabled selected>-- Pilih User --</option>
                          @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="npm" class="col-md-2 col-form-label form-control-label">NPM<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" placeholder="Masukkan NPM" id="npm" name="npm" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="fakultas_id">Kelas<span class="text-danger">*</span></label>
                              <input class="form-control" type="text" placeholder="Masukkan Kelas" id="kelas" name="kelas" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="user_id">Semester<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" min="1" max="14"  placeholder="Masukkan Semester"  id="semester" name="semester" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                    </div>  
                    <div class="form-group row mb-0">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="fakultas_id">Fakultas<span class="text-danger">*</span></label>
                            <select class="form-control" name="fakultas_id" required="required">
                              <option disabled selected>-- Pilih Fakultas --</option>
                              @foreach($fakultass as $fakultas)
                                <option value="{{ $fakultas->id }}">{{ $fakultas->nama_fakultas }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="jurusan_id">Jurusan<span class="text-danger">*</span></label>
                            <select class="form-control" name="jurusan_id" id="jurusan_id" required="required">
                            <option disabled selected>-- Pilih Jurusan --</option>
                            @foreach($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                            </select>
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
     @foreach($mahasiswas as $mahasiswa)
     <div class="modal fade" id="editModal-{{ $mahasiswa->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title mb-0" id="editModalLabel">Update Data Mahasiswa</h5>
                </div>
              <div class="modal-body">
                 <!-- Card body -->
                <form role="form" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" id="editForm">
                  @csrf
                  @method('PUT')
                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label form-control-label">Nama<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                      <select class="form-control" name="user_id" id="user_id" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      <option disabled selected>-- Nama User --</option>
                            @foreach($users as $user)
                              <option 
                              @if($mahasiswa->user_id == $user->id)
                                selected="selected" 
                              @endif
                              value="{{ $user->id }}" >{{ $user->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="npm" class="col-md-2 col-form-label form-control-label">NPM<span class="text-danger">*</span></label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $mahasiswa->npm }}" id="npm" name="npm" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="fakultas_id">Kelas<span class="text-danger">*</span></label>
                              <input class="form-control" type="text" value="{{ $mahasiswa->kelas }}" id="kelas" name="kelas" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="semester">Semester<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" min="1" max="14" value="{{ $mahasiswa->semester }}"  id="semester" name="semester" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                    </div>  
                    <div class="form-group row mb-0">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="fakultas_id">Fakultas<span class="text-danger">*</span></label>
                            <select class="form-control" name="fakultas_id" required="required">
                              <option disabled selected>-- Pilih Fakultas --</option>
                              @foreach($fakultass as $fakultas)
                              <option 
                              @if($mahasiswa->fakultas_id ==  $fakultas->id)
                                selected="selected" 
                              @endif
                              value="{{ $fakultas->id }}" >{{ $fakultas->nama_fakultas }}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="jurusan_id">Jurusan<span class="text-danger">*</span></label>
                            <select class="form-control" name="jurusan_id" id="jurusan_id" required="required">
                            <option disabled selected>-- Pilih Jurusan --</option>
                            @foreach($jurusans as $jurusan)
                              <option 
                              @if($mahasiswa->jurusan_id ==  $jurusan->id)
                                selected="selected" 
                              @endif
                              value="{{ $jurusan->id }}" >{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                            </select>
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
    @section('scripts') 
    <script type="text/javascript">
    function deletemahasiswa(id) {
        swal({
            title: 'Yakin Ingin Hapus Data ini?',
            text: "Data Tidak Bisa Dikembalikan Setelah Dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
                swal(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success')
            } else (
                result.dismiss === swal.DismissReason.cancel
            ) 
        })
      } 
    </script>
    @endsection  
    
@endsection