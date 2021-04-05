@extends('layouts.app')
@section('title', 'Pasok Barang')
@section('css')
<link rel="stylesheet" href="{{ asset('css') }}/isikrs/style.css" type="text/css">
@endsection
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h4 class="h1 text-white d-inline-block mb-0">Isi KRS</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
        <form method="POST" name="pasok_form" id="pasok_form" action="{{ route('isikrs.create') }}">
            @csrf
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
                <div class="row">
                    <div class="col-12 bg-dark-blue">
                    <div class="card card-noborder b-radius bg-gradient-default shadow">
                        <div class="card-body ">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between align-items-center transaction-header">
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="badge badge-lg badge-primary">
                                <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="transaction-code ml-3">
                                <h3 class="m-0 text-white">Kode KRS</h3>
                                <p class="m-0 text-white">KR{{ date('dmYHis') }}</p>
                                <input type="text" name="kode_krs" value="KR{{ date('dmYHis') }}" hidden="">
                                
                                </div>
                            </div>
                            <div class="col-md-8 text-right">
                                <button class="btn btn-sm btn-search" data-toggle="modal" data-target="#tableModal" type="button" data-tooltip="tooltip" data-placement="bottom" title="Cari Barang">
                                <i class="fas fa-search"></i> Cari Mata Kuliah</span>
                                </button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="card card-noborder b-radius">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-start align-items-center">
                            <div class="cart-icon mr-3">
                                <i class="mdi mdi-cart-outline"></i>
                            </div>
                            <p class="m-0 text-black-50">Daftar Mata Kuliah Yang Diisi</p>
                            </div>
                            <div class="table-responsive py-4">
                            <table class="table table-flush" id="trx">
                            <thead class="thead-light">
                                <tr>
                                    <td>Nama Mata Kuliah</td><td>Jenis</td><td>Semester</td><td>Jumlah SKS</td><td></td></tr></thead>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-noborder b-radius">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12 payment-1">
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
                        <div class="col-12 mt-4">
                        <table class="table-payment-2">
              
                            <tr>
                            <td class="text-left">
                                <span class="subtotal-td">Jumlah SKS</span>
                                <span class="jml-barang-td">0 Mata Kuliah</span>
                            </td>
                            <td class="text-right nilai-subtotal1-td"><div id="subtotal">0</div></td>
                            <td hidden=""><input type="text" class="nilai-subtotal2-td" name="subtotal" value="0"></td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                            <td colspan="2" class="text-center nilai-total1-td"><div id="total">0 </div></td>
                            <td hidden=""><input type="text" class="nilai-total2-td" name="total" value="0"></td>
                            </tr>
                        </table>
                        </div>
                        <div class="col-12 mt-2">
					                <button class="btn btn-primary btn-pasok btn-lg btn-block" type="submit">Isi KRS</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Daftar mk -->
<div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="tableModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="tableModalLabel">Daftar Mata Kuliah</h5>
    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                        <th>Nama Mata Kuliah</th>
                        <th>Jenis</th>
                        <th>Jumlah SKS</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mks as $mk)
                        <tr>
                            <td><h5 class="mb-0" >{{ $mk->nama_mk }}</h5>
                                <span class="text-uppercase text-muted font-weight-bold">{{ $mk->kode_mk }}</span>
                            <td><p class="m-0">{{ $mk->jenis }}</p></td>
                            <td><p class="m-0">{{ $mk->sks }}</p></td>
                            <td><p class="m-0">{{ $mk->semester }}</p></td>
                            <td><a href="#"  data-id={{ $mk->id }} data-semester={{ $mk->semester }} data-jenis={{ $mk->jenis }} data-nama={{ $mk->nama_mk }} data-kode={{ $mk->kode_mk }} data-sks={{ $mk->sks }} class="btn btn-primary btn-icon-only rounded-circle font-weight-bold btn-pilih" role="button"><i class="fas fa-chevron-right"></i></a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer"></div>
</div>
</div>
</div>


@include('layouts.footers.auth')

@section('scripts')
<script src="{{ asset('js') }}/transaction/script.js"></script>
<script type="text/javascript">

var subtotal=0;
var total=0;
var jumlah_barang=0;

$(document).on('click', '.btn-pilih', function(e){
    e.preventDefault();
    var kode_mk = $(this).data('kode');
    var semester = $(this).data('semester');
    var jenis = $(this).data('jenis');
    var nama = $(this).data('nama');
    var sks = $(this).data('sks');
    var matakuliah_id = $(this).data('id');
    subtotal += sks;
    total = subtotal;
    jumlah_barang+=1;
    var check = $('.kode-mk-td:contains('+ kode_mk +')').length;
    if(check == 0){
        $('#trx').append('<tr><td><input type="text" name="matakuliah_id[]" hidden="" value="' + matakuliah_id + '"><input type="text" name="kode_mk[]" hidden="" value="' + kode_mk + '"><span class="nama-mk-td">' + nama + '</span><span class="kode-mk-td"><br>kode MK:' + kode_mk +'</span><td><input type="text" name="jenis[]" hidden="" value="' + jenis + '"><span class="jenis-td">' + jenis + '</span></td><td><input type="text" name="semester[]" hidden="" value="' + semester + '"><span class="semester-td">' + semester + '</span></td><td><input type="text" name="sks_barang[]" hidden="" value="' + sks + '"><span>' + parseInt(sks).toLocaleString() + '</span></td><td><a href="#" class="btn btn-icons btn-rounded btn-secondary ml-1 btn-hapus"><p class="jumlah_barang_text" hidden="">1</p><i class="fa fa-trash"></i></a></td></tr>');
    subtotalKRS();
	  jumlahMK();
	  isiMK();
    $('.close-btn').click();
    $('.jml-barang-td').text(jumlah_barang + ' Mata Kuliah');
  }else{
        swal(
            "",
            "Mata Kuliah telah ditambahkan",
            "error"
        );
        }
    
});

$(document).on('click', '.btn-pasok', function(){
var total = parseInt($('.nilai-total2-td').val());
var cek_krs = parseInt($('.jumlah_barang_text').length);
  $('.nominal-error').prop('hidden', true);
    if(cek_krs == 0){
        swal(
        "",
        "Data KRS Kosong",
        "error"
        );
    }
    }
);

</script>

@endsection
@endsection
