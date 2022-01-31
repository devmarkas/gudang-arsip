@extends('layouts.app',[
	'title' => 'Tagihan Mitra',
])

@section('content')

<div class="header-content arsip">
    <div class="row">
        <div class="col-md-6">
            <h1>Lihat Arsip TAGIHAN MITRA</h1>
            <p>Data lengkap arsip TAGIHAN MITRA</p>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                   <button>
                       <img src="{{asset ("template")}}/img/icon-export-arsip.svg" alt="">
                       <p>Input Arsip Masuk</p>
                   </button>
                </div>

                <div class="col-xl-3 col-md-6">
                    <button> 
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
                    <button> 
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
                            <option>Tahun</option>
                            <option>2022</option>
                            <option>2021</option>
                            <option>2020</option>
                            <option>2019</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="bulan">
                            <option>Bulan</option>
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>Mei</option>
                            <option>Juni</option>
                            <option>Juli</option>
                            <option>Agustus</option>
                            <option>September</option>
                            <option>Oktober</option>
                            <option>November</option>
                            <option>Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="pekerjaan">
                            <option>Pilih Pekerjaan</option>
                            <option> 25%</option>
                            <option> 75%</option>
                            <option>PSB</option>
                            <option>MIGRASI</option>
                            <option>OSP</option>
                            <option>EKSPEDISI</option>
                            <option>LEMBUR</option>
                            <option>ITMOA 15%</option>
                            <option>ITMOA 25%</option>
                            <option>ITMOA 85%</option>
                            <option>ITMOA 75%</option>
                            <option>AMS 15%</option>
                            <option>AMS 25%</option>
                            <option>AMS 85%</option>
                            <option>AMS 75%</option>
                            <option>PT2 SIMPLE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="area">
                            <option>Pilih Area</option>
                            <option>SBU</option>
                            <option>MDR</option>
                            <option>SBS</option>
                            <option>SDA</option>
                            <option>PSN</option>
                            <option>MLG</option>
                            <option>KDI</option>
                            <option>MAN</option>
                            <option>JER</option>
                            <option>DPS</option>
                            <option>SGR</option>
                            <option>NTB</option>
                            <option>NTT</option>
                            <option>REG</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="box">
                                <option>Pilih Box</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                            </select>
                        </div>
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
                                Detail Arsip TAGIHAN MITRA
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group search-box">
                                <input type="text" class="form-control" placeholder="Cari Arsip">
                                <div class="input-group-append">
                                  <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                  </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-sm table-hover tabel-arsip">
                            <thead>
                              <tr>
                                <th scope="col">ID PM</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">PERIODE</th>
                                <th scope="col">TERITORY</th>
                                <th scope="col">BOX</th>
                                <th class="action" scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                              <tr>
                                <td>134947</td>
                                <td>PSB</td>
                                <td>September</td>
                                <td>Bali</td>
                                <td>Box A</td>
                                <td>
                                    <button type="button" class="btn btn-warning">History</button>
                                    <button type="button" class="btn btn-success">File</button>
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </td>
                              </tr>
                             
                            </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@push('js')
    
@endpush