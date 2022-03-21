@extends('layouts.app',[
	'title' => 'Commerce',
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
            <h1>Lihat Commerce</h1>
            <p>Data lengkap Commerce</p>
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
                            <option value="">Tahun</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="periode">
                            <option value="">Periode</option>
                            <option value="januari">Januari</option>
                            <option value="februari">Februari</option>
                            <option value="maret">Maret</option>
                            <option value="april">April</option>
                            <option value="mei">Mei</option>
                            <option value="juni">Juni</option>
                            <option value="juli">Juli</option>
                            <option value="agustus">Agustus</option>
                            <option value="september">September</option>
                            <option value="oktober">Oktober</option>
                            <option value="november">November</option>
                            <option value="desember">Desember</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="pekerjaan" id="pekerjaan">
                                <option value="">Pekerjaan</option>
                                <option value="bges">BGES</option>
                                <option value="capex_hem">CAPEX HEM</option>
                                <option value="ioan">IOAN</option>
                                <option value="lme">LME</option>
                                <option value="mattam">MATTAM</option>
                                <option value="migrasi">MIGRASI</option>
                                <option value="naru">NARU</option>
                                <option value="node_b">NODE B</option>
                                <option value="odp_gd">ODP GD</option>
                                <option value="olt">OLT</option>
                                <option value="osp_fo_ftth">OSP FO FTTH</option>
                                <option value="psb">PSB</option>
                                <option value="qe">QE</option>
                                <option value="tdm">TDM</option>
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
                                Detail Arsip Commerce
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
                        <table class="table table-sm table-hover tabel-arsip" id="commerce_table">
                            <thead>
                              <tr>
                                <th class="action" scope="col">Jenis Dokumen</th>
                                <th class="action" scope="col">Pekerjaan</th>
                                <th class="action" scope="col">Tahun</th>
                                <th class="action" scope="col">Periode</th>
                                <th class="action" scope="col">Area</th>
                                <th class="action" scope="col">Nama Box</th>
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

@endpush