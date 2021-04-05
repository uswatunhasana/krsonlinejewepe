@extends('layouts.app')
@section('title', 'Data KRS Mahasiswa')

@section('content')
<!-- Tampilan Pengisian KRS -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
      <!-- Table -->
    <div class="row">
        <div class="col">
          <div class="card">
             <!-- Card header -->
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-7">
                            <h6 class="h2 d-inline-block mb-0">Data KRS Mahasiswa</h6>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th width="30px">No.</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jumlah SKS</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;                   
                  @endphp
                  @foreach($krss as $krs)
                  <tr>
                    <td>{{$no ++ }}</td>
                    <td><h5 class="mb-0" >{{ $krs->mahasiswa->user->name}}</h5>
                          <span class="text-uppercase text-muted font-weight-bold">{{ $krs->mahasiswa->npm }}</span>
                    </td>
                        <td>{{  $krs->mahasiswa->kelas }}</td>
                        <td>{{$krs->jumlah}}</td>
                        <td><a href="#" id="detail" data-toggle="modal" data-target="#infoSuplai"  class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="bottom" title="detail pasok" 
                          data-kode={{ $krs->kode_krs }} 
                          data-name={{ $krs->mahasiswa->user->name}} 
                          data-npm={{ $krs->mahasiswa->npm }}
                          data-kelas={{  $krs->mahasiswa->kelas }}
                          data-semester={{  $krs->mahasiswa->semester }}
                          data-jurusan={{  $krs->mahasiswa->jurusan }}
                          data-fakultas={{  $krs->mahasiswa->fakultas }}
                          data-tanggal={{  $krs->created_at }}
                          data-jumlah={{  $krs->jumlah }}
                          >
                          <i class="fa fa-info-circle"></i></a>
                        </td>
                    </tr>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>   
</div>

<!-- Modal info Transaksi -->
<div class="modal fade" id="infoSuplai" tabindex="-1" role="dialog" aria-labelledby="infoSuplaiLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content ">
                <div class="modal-header">
                  <h5 class="modal-title mb-0" id="infoSuplaiLabel">Informasi Transaksi</h5>
                </div>
              <div class="modal-body">
              @php
              $no = 1;
              @endphp
              <!-- Card body -->
                <div class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="-component-tab">
                    <dl class="row">
                    <dt class="col-sm-4"><h4>Kode KRS </h4></dt>
                      <dd class="col-sm-8" id="kode_krs-dd"> </dd>
                      <dt class="col-sm-4"><h4>Nama </h4></dt>
                      <dd class="col-sm-8" id="name-dd"> </dd>
                      <dt class="col-sm-4"><h4>NPM</h4></dt>
                      <dd class="col-sm-8" id="npm-dd" ></dd>
                      <dt class="col-sm-4"><h4>Kelas</h4></dt>
                      <dd class="col-sm-8" id="kelas-dd" ></dd>
                      <dt class="col-sm-4"><h4>Semester</h4></dt>
                      <dd class="col-sm-8" id="semester-dd" ></dd>
                      <dt class="col-sm-4"><h4>Jurusan</h4></dt>
                      <dd class="col-sm-8" id="jurusan-dd" ></dd>
                      <dt class="col-sm-4"><h4>Fakultas</h4></dt>
                      <dd class="col-sm-8" id="fakultas-dd" ></dd>
                      <dt class="col-sm-4"><h4>Tanggal Isi KRS</h4></dt>
                      <dd class="col-sm-8" id="tgl-dd" > </dd>
                    </dl>
                  </div>
                  <div class="table-responsive">
                    <div>
                      <table class="table align-items-center tabel-detail" id="#trx">
                        <thead class="thead-light">
                          <tr>
                            <th>No.</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>Jenis</th>
                            <th>SKS</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="-component-tab">
                        <dl class="row text-right">
                          <dt class="col-sm-9 mb-0"><h4>Jumlah KRS Yang Diambil :</h4></dt>
                          <dd class="col-sm-3 mb-0" id="jumlah-dd"></dd>
                        </dl>
                  </div>
              </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>

@include('layouts.footers.auth')  
@section('scripts')
<script type="text/javascript">
  
      $(function () {
      $('[data-tooltip="tooltip"]').tooltip()
      })

    $(document).ready(function(){
		$(document).on('click','#detail', function () {
      var name = $(this).data('name');
      var npm = $(this).data('npm');
      var kelas = $(this).data('kelas');
      var semester= $(this).data('semester');
      var jurusan = $(this).data('jurusan');
      var fakultas = $(this).data('fakultas');
      var tanggal = $(this).data('tanggal');
      var subtotal = $(this).data('subtotal');
      var kode = $(this).data('kode');
        $('#kode_krs-dd').text(': '+kode);
        $('#name-dd').text(': '+name);
        $('#npm-dd').text(': '+npm);
        $('#kelas-dd').text(': '+kelas);
        $('#semester-dd').text(': '+semester);
        $('#jurusan-dd').text(': '+jurusan);
        $('#fakultas-dd').text(': '+fakultas);
        $('#tgl-dd').text(': '+tanggal);		    
        $('#subtotal-dd').html(parseInt(jumlah).toLocaleString());
      $.ajax({
        url:"{{route('datakrs.detail')}}",
        method:'GET',
        data:{kode:kode},
        dataType:'json',
        success:function(data)
          {
            $('.list').html(data.table_data)
          },
        complete:function(data)
          {
              $('.list').html(data.table_data)
          }
      })
        $('#modal-item').modal('hide');
		})
  });

</script>
@endsection
@endsection