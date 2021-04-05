@extends('layouts.app')
@section('title', 'Data mk')
@section('content')
<!-- Tampilan Data Mata Kuliah -->
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
                <h6 class="h2 d-inline-block mb-0">Data Mata Kuliah</h6>
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
                    <th width="30px">No</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Jenis</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th width="30px">No</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Jenis</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach($mks as $mk)
                    <tr>
                      <td>{{$no ++ }}</td>
                      <td>{{ $mk->kode_mk }}</td>
                      <td>{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->jenis }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>{{ $mk->semester }}</td>
                    <td>
                    
                      <button data-toggle="modal" data-target="#editModal-{{ $mk->id }}" class="btn btn-sm btn-primary"data-tooltip="tooltip" data-placement="bottom" title="edit"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" type="button" data-tooltip="tooltip" data-placement="bottom" title="hapus" id="{{ $mk->id }}" onclick="deletebarang(this.id)"> <i class="fa fa-trash"></i>
                          </button>
                          <form id="delete-form-{{ $mk->id }}" action="{{ route('matakuliah.delete',$mk->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                      </td>
                      <div class="modal fade" id="editModal-{{ $mk->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title mb-0" id="editModalLabel">Update Data mk</h5>
                </div>
              <div class="modal-body">
                 <!-- Card body -->
                <form role="form" action="{{ route('matakuliah.edit', $mk->id) }}" method="POST" id="editForm">
                  @csrf
                  @method('PUT')
                  <div class="form-group row">
                      <label for="nama_mk" class="col-md-4 col-form-label form-control-label">Kode MK<span class="text-danger">*</span></label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" value="{{ $mk->kode_mk }}" id="kode_mk" name="kode_mk" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama_mk" class="col-md-4 col-form-label form-control-label">Nama MK <span class="text-danger">*</span></label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" value="{{ $mk->nama_mk }}" id="nama_mk" name="nama_mk" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-md-4 col-form-label form-control-label" for="nama_mk">Kategori<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                            <select class="form-control" name="jenis" id="jenis" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option value="W" {{ $mk->jenis === 'W' ? 'selected' : '' }} >Wajib</option>
                            <option value="P" {{ $mk->jenis === 'P' ? 'selected' : '' }} >Peminatan</option>
                            <option value="U" {{ $mk->jenis === 'U' ? 'selected' : '' }} >Utama</option>
                            </select>
                            </select>
                          </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="sks">SKS<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" min="1" max="6"  value="{{ $mk->sks }}" id="sks" name="sks" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="nama_mk">Semester<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" min="1" max="14"  value="{{ $mk->semester }}" id="semester" name="semester" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                    </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
            </form>
         </div>
       </div>
    </div>
                      @endforeach
                    </tr>
                </tbody>
              </table>
          </div>      
        </div>
      </div>
    </div>
    </div>

      <!-- Modal  Add -->
     <div class="modal fade" id="addModal" tabindex="-1" jenis="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content ">
                <div class="modal-header">
                  <h5 class="modal-title mb-0" id="addModalLabel">Tambah Data Mata Kuliah</h5>
                </div>
              <div class="modal-body">
                 <!-- Card body -->
                <form jenis="form" action="{{ route('matakuliah.create') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                    <!-- Input groups with icon -->
                    <div class="form-group row">
                      <label for="kode_mk" class="col-md-4 col-form-label form-control-label">Kode MK<span class="text-danger">*</span></label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" placeholder="Masukkan Kode Mata Kuliah" id="kode_mk" name="kode_mk" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama_mk" class="col-md-4 col-form-label form-control-label">Nama MK <span class="text-danger">*</span></label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" placeholder="Masukkan Nama Mata Kuliah" id="nama_mk" name="nama_mk" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                            <label  class="col-md-4 col-form-label form-control-label" for="nama_mk">Jenis<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                            <select class="form-control" name="jenis" id="jenis" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <option disabled selected>-- Jenis MK --</option>
                              <option value="W">Wajib</option>
                              <option value="P">Peminatan</option>
                              <option value="U">Utama</option>
                            </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="nama_mk">SKS<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" min="1" max="6" placeholder="Masukkan Jumlah SKS" id="sks" name="sks" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="nama_mk">Semester<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" min="1" max="14"  placeholder="Masukkan Semester"  id="semester" name="semester" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
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

    @include('layouts.footers.auth')  
    @section('scripts') 
    <script type="text/javascript">
    function deletebarang(id) {
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