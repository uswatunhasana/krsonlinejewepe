@extends('layouts.app')
@section('title', 'Daftar user')
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
                    <th>Nama user</th>
                    <th>Username</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th width="20px">No</th>
                    <th>Nama user</th>
                    <th>Username</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach($users as $user)
                  @if ($user->role == "user")
                <tr>
                  <td width="40px">{{ $no++ }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->username }}</td>
                  <td>
                    <button data-toggle="modal" data-target="#editModal-{{ $user->id }}" class="btn btn-sm btn-primary"data-tooltip="tooltip" data-placement="bottom" title="edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger" type="button" data-tooltip="tooltip" data-placement="bottom" title="hapus" id="{{ $user->id }}" onclick="deleteuser(this.id)"> <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.delete',$user->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endif
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
    @section('scripts') 
    <script type="text/javascript">
    function deleteuser(id) {
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