@extends('layouts.app',[
	'title' => 'Construction',
])
@section('content')

<div class="header-content arsip">
    @if ($errors->any())
        <div id="validasi" class="peringatan">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger"> 
                <span>{{$error}}</span> 
                <button type="button" style="width: 30px; height: 30px;" class="close ml-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h1>Lihat Construction</h1>
            <p>Data lengkap Construction</p>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                   <button type="button" data-toggle="modal" data-target="#input-arsip-masuk">
                       <img src="{{asset ("template")}}/img/icon-export-arsip.svg" alt="">
                       <p>Input Arsip Masuk</p>
                   </button>
                </div>

                <div class="col-xl-3 col-md-6">
                    <button type="button" data-toggle="modal" data-target="#input-arsip-keluar"> 
                        <img src="{{asset ("template")}}/img/icon-arsip-keluar.svg" alt="">
                        <p>Input Arsip Keluar</p>
                    </button>
                </div>

                <div class="col-xl-3 col-md-6">
                    <button>
                        <img src="{{asset ("template")}}/img/icon-scan-arsip.svg" alt="">
                        <p>Scan Arsip</p>
                    </button>
                </div>

                <div class="col-xl-3 col-md-6">
                    <button type="button" data-toggle="modal" data-target="#excel-import"> 
                        <img src="{{asset ("template")}}/img/icon-excel-import.svg" alt="">
                        <p>Excel Import</p>
                    </button>
                </div>
            </div>
        </div>
    </div>    
</div>

<div class="container-content" style="position: relative; margin-top: -20px;" >
    <div class="row">
        <div class="col-md-3">
            <div class="card-custom sidebar-content">
                <div class="conten-custom">
                   <h3 class="text-center">
                       Filter
                   </h3>
                   <form action="">
                        <div class="form-group">
                            <select class="form-control" id="tahun">
                            <option value="">Pilih Tahun</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="nomor_surat_pesanan">
                            <option value="">Pilih Nomor Surat Pesanan</option>
                            <option value="001071">001071</option>
                            <option value="001098">001098</option>
                            <option value="001456">001456</option>
                            <option value="001932">001932</option>
                            <option value="002752">002752</option>
                            <option value="006095">006095</option>
                            <option value="006560">006560</option>
                            <option value="007687">007687</option>
                            <option value="007720">007720</option>
                            <option value="008062">008062</option>
                            <option value="008116">008116</option>
                            <option value="008834">008834</option>
                            <option value="010232">010232</option>
                            <option value="011890">011890</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="pekerjaan" id="pekerjaan">
                                <option value="">Pilih Pekerjaan</option>
                                <option value="node-b_/_node_b">NODE-B / NODE B</option>
                                <option value="relok_mdu">RELOK MDU</option>
                                <option value="scrap">SCRAP</option>
                                <option value="t-cloud_/_tcloud">T-CLOUD / TCLOUD</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="area/witel" id="area/witel">
                                <option value="">Pilih Area/Witel</option>
                                <option value="regional">Regional</option>
                                <option value="sby_utara">SBY UTARA</option>
                                <option value="madura">MADURA</option>
                                <option value="sby_selatan">SBY SELATAN</option>
                                <option value="sidoarjo">SIDOARJO</option>
                                <option value="pasuruan">PASURUAN</option>
                                <option value="madiun">MADIUN</option>
                                <option value="malang">MALANG</option>
                                <option value="jember">JEMBER</option>
                                <option value="kediri">KEDIRI</option>
                                <option value="denpasar">DENPASAR</option>
                                <option value="singaraja">SINGARAJA</option>
                                <option value="kupang">KUPANG</option>
                                <option value="mataram">MATARAM</option>
                            </select>
                        </div>
                        <button class="btn btn-secondary" type="button" style="width: 100%" id="btn_reset_filter">Reset Filter</button>
                   </form>
                   
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card-custom">
                <div class="conten-custom">
                    <div class="row  title-header">
                        <div class="col-md-6">
                            <h3>
                                Detail Arsip Construction
                            </h3>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group search-box">
                                <input type="text" class="form-control" placeholder="Cari Arsip" id="cari_arsip" onkeyup="cari_arsip()">
                                <div class="input-group-append">
                                  <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                  </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-sm table-hover tabel-arsip" id="construction_table">
                            <thead>
                              <tr>
                                <th class="action" scope="col">NO. SURAT PESANAN</th>
                                <th class="action" scope="col">NODE</th>
                                <th class="action" scope="col">PEKERJAAN</th>
                                <th class="action" scope="col">BULAN</th>
                                <th class="action" scope="col">AREA</th>
                                <th class="action" scope="col">NAMA BOX</th>
                              </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($archives as $archive)
                                <tr style="background-color: {{$archive->status!='IN'?'#d5483b':''}}">
                                  <td>{{$archive->id_pm}}</td>
                                  <td>{{$archive->pekerjaan}}</td>
                                  <td>{{strtoupper($archive->bulan)}}</td>
                                  <td>{{$archive->teritory}}</td>
                                  <td>{{$archive->box}}</td>
                                  <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history({{$archive->id_pm}})" data-target="#history">History</button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file({{$archive->id_pm}})" data-target="#file" data-arsip-id="{{$archive->id_pm}}">File</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file({{$archive->id_pm}})" data-target="#hapus">Hapus</button>
                                    <button type="button" class="btn btn-secondary" onclick="qrcode_archive({{$archive->id_pm}})">QR</button>
                                  </td>
                                </tr> 
                                @endforeach --}}
                             
                            </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Input Arsip Masuk -->
@include('admin.kelola-arsip.tag-mitra.modal-arsip-masuk')

<!-- Modal Input Arsip Masuk -->
@include('admin.kelola-arsip.tag-mitra.modal-arsip-keluar')

<!-- Modal Excel Import -->
@include('admin.kelola-arsip.tag-mitra.modal-excel-import')
<!-- Modal Excel History -->
@include('admin.kelola-arsip.tag-mitra.modal-history')

<!-- Modal Excel File -->
@include('admin.kelola-arsip.tag-mitra.modal-file')

<!-- Modal Excel Hapus -->
@include('admin.kelola-arsip.tag-mitra.modal-hapus')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@push('js')

<!-- Sibar JS -->
<script>
    $(".nav-link").addClass(["collapsed","active"]);
    $("#unit a:first-child").addClass("collapsed").attr("aria-expanded", "true");
    $("#unit").addClass("show");
</script>

@endpush