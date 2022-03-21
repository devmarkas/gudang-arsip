@extends('layouts.app',[
	'title' => 'Tagihan Mitra',
])
@section('style')
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <style>
        div#barcode_modal_import .modal-dialog,
        div#barcode_modal .modal-dialog {
            max-width: 768px;
        }

        div#barcode_modal_import .modal-dialog .item-barcode,
        div#barcode_modal .modal-dialog .item-barcode {
            width: 33.33%;
            float: left;
            padding: 15px;
        }

        div#barcode_modal_import .modal-dialog .modal-body,
        div#barcode_modal .modal-dialog .modal-body {
            flex: none;
            margin: 0 !important;
            margin-top: -45px !important;
        }

        div#barcode_modal_import .modal-dialog .item-barcode svg,
        div#barcode_modal .modal-dialog .item-barcode svg {
        width: 100%;
        }
    </style>
    <style>
        @media screen {
            #printSection {
                display: none;
            }
            #barcode_modal_import .modal-dialog,
        #barcode_modal .modal-dialog {
            max-width: 768px;
        }

        #barcode_modal_import .modal-dialog .item-barcode,
        #barcode_modal .modal-dialog .item-barcode {
            width: 33.33%;
            float: left;
            padding: 15px;
        }

        #barcode_modal_import .modal-dialog .modal-body,
        #barcode_modal .modal-dialog .modal-body {
            flex: none;
            margin: 0 !important;
            margin-top: -45px !important;
        }

        #barcode_modal_import .modal-dialog .item-barcode svg,
        #barcode_modal .modal-dialog .item-barcode svg {
        width: 100%;
        }
        }

        @media print {
            body * {
                visibility:hidden;
            }
            #printSection, #printSection * {
                visibility:visible;
                /* width: 100% */
            }
            #printSection {
                position:absolute;
                left:0;
                top:0;
            }
            #barcode_modal_import .modal-dialog,
        #barcode_modal .modal-dialog {
            max-width: 768px;
        }

        #barcode_modal_import .modal-dialog .item-barcode,
        #barcode_modal .modal-dialog .item-barcode {
            width: 33.33%;
            float: left;
            padding: 15px;
        }

        #barcode_modal_import .modal-dialog .modal-body,
        #barcode_modal .modal-dialog .modal-body {
            flex: none;
            margin: 0 !important;
            margin-top: -45px !important;
        }

        #barcode_modal_import .modal-dialog .item-barcode svg,
        #barcode_modal .modal-dialog .item-barcode svg {
        width: 100%;
        }
        }
    </style>
    <style type="text/css" media="print">
        #barcode_modal_import .modal-dialog,
        #barcode_modal .modal-dialog {
            max-width: 768px;
        }

        #barcode_modal_import .modal-dialog .item-barcode,
        #barcode_modal .modal-dialog .item-barcode {
            width: 33.33%;
            float: left;
            padding: 15px;
        }

        #barcode_modal_import .modal-dialog .modal-body,
        #barcode_modal .modal-dialog .modal-body {
            flex: none;
            margin: 0 !important;
            margin-top: -45px !important;
        }

        #barcode_modal_import .modal-dialog .item-barcode svg,
        #barcode_modal .modal-dialog .item-barcode svg {
        width: 100%;
        }
      </style>
@endsection
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
            <h1>Lihat Arsip TAGIHAN MITRA</h1>
            <p>Data lengkap arsip TAGIHAN MITRA</p>
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
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="bulan">
                            <option value="">Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="pekerjaan">
                            <option value="">Pilih Pekerjaan</option>
                            <option value='DSHR'>DSHR</option>
                            <option value='GCU'>GCU</option>
                            <option value='IOAN'>IOAN</option>
                            <option value='MIGRASI'>MIGRASI</option>
                            <option value='OSP'>OSP</option>
                            <option value='PELOLOSAN'>PELOLOSAN</option>
                            <option value='PENGADAAN'>PENGADAAN</option>
                            <option value='PENGIRIMAN'>PENGIRIMAN</option>
                            <option value='PSB'>PSB</option>
                            <option value='PT2 SIMPLE'>PT2 SIMPLE</option>
                            <option value='SEWA'>SEWA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="teritory">
                            <option value="">Pilih Area</option>
                            <option value='DENPASAR'>DENPASAR</option>
                            <option value='JATIM'>JATIM</option>
                            <option value='JEMBER'>JEMBER</option>
                            <option value='KEDIRI'>KEDIRI</option>
                            <option value='KUPANG'>KUPANG</option>
                            <option value='MADIUN'>MADIUN</option>
                            <option value='MADURA'>MADURA</option>
                            <option value='MALANG'>MALANG</option>
                            <option value='MATARAM'>MATARAM</option>
                            <option value='PASURUAN'>PASURUAN</option>
                            <option value='REGIONAL'>REGIONAL</option>
                            <option value='SBY SELATAN'>SBY SELATAN</option>
                            <option value='SBY UTARA'>SBY UTARA</option>
                            <option value='SIDOARJO'>SIDOARJO</option>
                            <option value='SINGARAJA'>SINGARAJA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="box">
                                <option value="">Pilih Box</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
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
                                Detail Arsip TAGIHAN MITRA
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
                        <table class="table table-sm table-hover tabel-arsip" id="tag_mitra_table">
                            <thead>
                              <tr>
                                <th scope="col">ID PM</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">PERIODE</th>
                                <th scope="col">Area</th>
                                <th scope="col">BOX</th>
                                <th class="action" scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($archives as $archive)
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
                                @endforeach
                             
                            </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Session::has('barcode'))
<input type="hidden" name="text_barcode" id="text_barcode" value="{{ Session::get('barcode') }}">
<div class="modal fade" id="barcode_modal" tabindex="-1" role="dialog" aria-labelledby="barcode_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <p style="text-align: left;" id="barcode_modalLabel">Barcode Generated</p>
        </div>
        <div class="modal-body" id="print_qrcode_input" style="display: block;margin: auto">
            @php
                echo '<img style="margin-bottom:10px;" src="data:image/png;base64,' . DNS1D::getBarcodePNG(json_decode(Session::get('barcode'))[0], 'CODABAR') . '" alt="barcode"   />';
            @endphp
            <table style="width: 100%">
                <tr>
                    <td><b>ID PM</b></td>
                    <td style="text-align: right">{{json_decode(Session::get('barcode'))[0]}}</td>
                </tr>
                <tr>
                    <td><b>Pekerjaan</b></td>
                    <td style="text-align: right">{{json_decode(Session::get('barcode'))[2]}}</td>
                </tr>
                <tr>
                    <td><b>Periode</b></td>
                    <td style="text-align: right">{{json_decode(Session::get('barcode'))[1]}}</td>
                </tr>
                <tr>
                    <td><b>Teritory</b></td>
                    <td style="text-align: right">{{json_decode(Session::get('barcode'))[3]}}</td>
                </tr>
                <tr>
                    <td><b>Box</b></td>
                    <td style="text-align: right">{{json_decode(Session::get('barcode'))[4]}}</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="print_barcode('print_qrcode_input')"   style="background-color: #1180BF; width: 100%" data-dismiss="modal">Print</button>
        </div>
    </div>
    </div>
</div>
@endif

<div class="modal fade" id="qrcode_modal" tabindex="-1" role="dialog" aria-labelledby="barcode_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <p style="text-align: left;" id="barcode_modalLabel">Barcode Generated</p>
        </div>
        <div class="modal-body" id="print_qrcode" style="display: block;margin: auto">
            <img id="barcode"/>
            <table style="width: 100%">
                <tr>
                    <td><b>ID PM</b></td>
                    <td style="text-align: right" id="qr_code_id_pm"></td>
                </tr>
                <tr>
                    <td><b>Periode</b></td>
                    <td style="text-align: right" id="qr_code_periode"></td>
                </tr>
                <tr>
                    <td><b>Teritory</b></td>
                    <td style="text-align: right" id="qr_code_teritory"></td>
                </tr>
                <tr>
                    <td><b>Box</b></td>
                    <td style="text-align: right" id="qr_code_box"></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="print_barcode('print_qrcode')"  style="background-color: #1180BF; width: 100%" data-dismiss="modal">Print</button>
        </div>
    </div>
    </div>
</div>

@if (Session::has('succes_import'))
 <div class="modal fade" id="barcode_modal_import" tabindex="-1" role="dialog" aria-labelledby="barcode_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <p style="text-align: left;" id="barcode_modalLabel">Barcode Generated</p>
        </div>
        <div class="modal-body" id="print_qrcode_import">
            @foreach (json_decode(Session::get('succes_import')) as $barcode)
            <div class="item-barcode" id="item-barcode">
                @php
                    echo '<img style="margin-bottom:10px;" src="data:image/png;base64,' . DNS1D::getBarcodePNG($barcode->id_pm, 'CODABAR') . '" alt="barcode"   />';
                @endphp
                <table style="width: 100%">
                    <tr>
                        <td><b>ID PM</b></td>
                        <td style="text-align: right">{{$barcode->id_pm}}</td>
                    </tr>
                    <tr>
                        <td><b>Periode</b></td>
                        <td style="text-align: right">{{$barcode->periode}}</td>
                    </tr>
                    <tr>
                        <td><b>Teritory</b></td>
                        <td style="text-align: right">{{$barcode->teritory}}</td>
                    </tr>
                    <tr>
                        <td><b>Box</b></td>
                        <td style="text-align: right">{{$barcode->box}}</td>
                    </tr>
                </table>
        </div>
            @endforeach
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="print_barcode('print_qrcode_import')" style="background-color: #1180BF; width: 100%" data-dismiss="modal">Print</button>
        
        </div>
    </div>
    </div>
</div>
 @endif
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
<script src="https://cdn.jsdelivr.net/jsbarcode/3.3.20/JsBarcode.all.min.js"></script>
<script>

function print_barcode(elem){
    const node = document.getElementById(elem);
    var domClone = node.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
$(document).ready(function(){
    $('#barcode_modal_import').modal();
    //Show  Modal If Exist
    $('#barcode_modal').modal();
    //Hide Button Tambah File
    $('#tambah_file').hide();
    //Show if clicked
    $('#btn_tambah_file').click(function(){
        $('#tambah_file').show();
    });

    $('#tahun').on('change', function() {
            var tahun=this.value;
            var bulan=$('#bulan').val();
            var pekerjaan=$('#pekerjaan').val();
            var teritory=$('#teritory').val();
            var box=$('#box').val();
            archives(tahun,bulan,pekerjaan,teritory,box)
        });

        $('#bulan').on('change', function() {
            var tahun=$('#tahun').val();
            var bulan=this.value;
            var teritory=$('#teritory').val();
            var pekerjaan=$('#pekerjaan').val();
            var box=$('#box').val();
            archives(tahun,bulan,pekerjaan,teritory,box)
        });

        $('#teritory').on('change', function() {
            var tahun=$('#tahun').val();
            var bulan=$('#bulan').val();
            var teritory=this.value;
            var box=$('#box').val();
            var pekerjaan=$('#pekerjaan').val();
            archives(tahun,bulan,pekerjaan,teritory,box)
        });

        $('#pekerjaan').on('change', function() {
            var tahun=$('#tahun').val();
            var bulan=$('#bulan').val();
            var teritory=$('#teritory').val();
            var pekerjaan=this.value;
            var box=$('#box').val();
            archives(tahun,bulan,pekerjaan,teritory,box)
        });

        $('#box').on('change', function() {
            var tahun=$('#tahun').val();
            var bulan=$('#bulan').val();
            var teritory=$('#teritory').val();
            var pekerjaan=$('#pekerjaan').val();
            var box=this.value;
            archives(tahun,bulan,pekerjaan,teritory,box)
        });

        $('#btn_reset_filter').click(function(){
            $("select").each(function() { this.selectedIndex = 0 });
            var tahun=$('#tahun').val();
            var bulan=$('#bulan').val();
            var teritory=$('#teritory').val();
            var box=$('#box').val();
            var pekerjaan=$('#pekerjaan').val();
            archives(tahun,bulan,pekerjaan,teritory,box)
        })

        function archives(tahun,bulan,pekerjaan,teritory,box){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/filter-impress-fund',
                data:{
                    tahun: tahun,
                    bulan: bulan,
                    teritory: teritory,
                    pekerjaan: pekerjaan,
                    box: box,
                    type: 'TM',
                },
                success: function (data) {
                    console.log(data)
                    $('#tag_mitra_table tbody tr').remove()
                    if(data.length>0){
                        var color=''
                        for (let index = 0; index < data.length; index++) {
                            if (data[index].status!='IN') {
                                color='#d5483b'
                            } else {
                                color=''
                            }
                            $('#tag_mitra_table > tbody:last-child').append('\
                                <tr style="background-color: '+color+'">\
                                <td>'+data[index].id_pm+'</td>\
                                <td>'+data[index].pekerjaan+'</td>\
                                <td>'+data[index].bulan.substring(0, 3).toUpperCase()+'</td>\
                                <td>'+data[index].teritory+'</td>\
                                <td>BOX '+data[index].box+'</td>\
                                <td>\
                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history('+data[index].id_pm+')" data-target="#history">History</button>\
                                    <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file('+data[index].id_pm+')" data-target="#file" data-arsip-id="'+data[index].id_pm+'">File</button>\
                                    <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file('+data[index].id_pm+')" data-target="#hapus">Hapus</button>\
                                    <button type="button" class="btn btn-secondary" onclick="qrcode_archive('+data[index].id_pm+')">QR</button>\
                                </td>\
                                </tr>'
                            );
                        }
                    }else{
                        $('#tag_mitra_table > tbody:last-child').append('\
                        <tr>\
                            <td></td>\
                            <td></td>\
                            <td style="text-align:center">Item Arsip Tidak Ditemukan</td>\
                            <td></td>\
                            <td></td>\
                        </tr>');

                    }
                },
                error: function() { 
                    console.log(data);
                }
            });       
        }
});

// Add File and open List File in Archive
function add_file(archive_id){
    $('#archive_id').val(archive_id)
    $('#tabel-arsip tbody tr').remove()
    $.ajax({
        type: 'GET',
        url: '/impress-fund/'+archive_id,
        success: function (data) {
            $('#tabel-arsip tbody tr').remove()
            if(data.length>0){
                for (let index = 0; index < data.length; index++) {
                    var tanggal=data[index].created_at
                    var options = {day: 'numeric', month: 'long', year: 'numeric', hour: 'numeric',minute:'numeric' };
                    var today  = new Date(tanggal);
                    $('#tabel-arsip > tbody:last-child').append('\
                    <tr>\
                        <td>'+today.toLocaleDateString("en-US", options)+'</td>\
                        <td>'+data[index].name+'</td>\
                        <td>\
                            <a href="/template/img/archive/'+data[index].file+'" ><img src="{{asset ("template")}}/img/icon-preview.svg" alt=""></a>\
                        </td>\
                    </tr>'
                    );
                }
            }else{
                $('#tabel-arsip > tbody:last-child').append('\
                    <tr>\
                        <td></td>\
                        <td style="text-align:center">Item Arsip Tidak Ditemukan</td>\
                        <td></td>\
                    </tr>');
            }
        },
        error: function() { 
            console.log(data);
        }
    });
}
//open History
function open_history(archive_id){
    $('#tabel-history tbody tr').remove()
    $.ajax({
        type: 'GET',
        url: '/history-archive/'+archive_id,
        success: function (data) {
            $('#tabel-history tbody tr').remove()
            if(data.length>0){
                for (let index = 0; index < data.length; index++) {
                    var tanggal=data[index].created_at
                    var options = {day: 'numeric', month: 'long', year: 'numeric', hour: 'numeric',minute:'numeric' };
                    var today  = new Date(tanggal);
                    $('#tabel-history > tbody:last-child').append('\
                    <tr>\
                        <td>'+today.toLocaleDateString("en-US", options)+'</td>\
                        <td>'+data[index].status+'</td>\
                        <td>'+data[index].name+'</td>\
                    </tr>'
                    );
                }
            }else{
                console.log('tidak ada')
            }
        },
        error: function() { 
            console.log(data);
        }
    });
}
function find_archive(archive_id){
    var id_archive=$('#id_archive').val()
    $('#tabel_archive_partner_out tr').remove()
    $.ajax({
        type: 'GET',
        url: '/out-archive-partner/'+id_archive,
        success: function (data) {
            console.log(data)
            $('#tabel_archive_partner_out tr').remove()
            if(data.length>0){
                for (let index = 0; index < data.length; index++) {
                    $('#tabel_archive_partner_out > tbody:last-child').append('\
                    <tr>\
                    <td>'+data[index].id_pm+'</td>\
                    <td>'+data[index].bulan.substring(0, 3).toUpperCase()+'</td>\
                    <td>'+data[index].teritory+'</td>\
                    <td>BOX '+data[index].box+'</td>\
                    <td>\
                        <button type="button" class="button" style="height: 29px" data-toggle="modal" data-target="#input-arsip-confrim-keluar" data-dismiss="modal" onclick="modal_archive_partner_out('+data[index].id_pm+')" aria-label="Close">Arsip Keluar</button>\
                    </td>\
                    </tr>'
                    );
                }
            }else{
                console.log('tidak ada')
            }
        },
        error: function() { 
            console.log(data);
        }
    });
}

function modal_archive_partner_out(id_archive){
    $("#archive_id_modal").html(id_archive);
}

function modal_delete_file(archive_id){
    console.log(archive_id)
    $("#archive_id_modal_hapus").html(archive_id);
}

function delete_file(){
    var id_archive=$("#archive_id_modal_hapus").html()
    $("#archive_id_sukses_delete").html(id_archive);
    $.ajax({
        type: 'GET',
        url: '/delete-partner-archive/'+id_archive,
        success: function (data) {
            setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
            }, 1000); 
        },
        error: function() { 
            console.log(data);
        }
    });
}

function archive_out(){
    var id_archive=$("#archive_id_modal").html()
    $("#archive_id_take_out").html(id_archive);
    $.ajax({
        type: 'GET',
        url: '/take-out-archive/'+id_archive,
        success: function (data) {
            console.log(data)
        },
        error: function() { 
            console.log(data);
        }
    });
}
function qrcode_archive(archive_id){
    $('#qrcode canvas').remove()
    $('#qrcode img').remove()
    $.ajax({
        type: 'GET',
        url: '/qrcode-impress-fund/'+archive_id,
        success: function (data) {
            console.log(data)
            $('#qrcode_modal').modal();
            JsBarcode("#barcode", data.id_pm.toString(), {format: "msi",  displayValue: false});
            $('#qr_code_id_pm').html(data.id_pm)
            $('#qr_code_periode').html(data.bulan)
            $('#qr_code_teritory').html(data.teritory)
            $('#qr_code_box').html(data.box)
        },
        error: function() { 
            console.log(data);
        }
    });
}

function cari_arsip(){
    var cari=$('#cari_arsip').val()
    $.ajax({
        type: 'GET',
        url: '/cari-tag-partner/'+cari,
        success: function (data) {
        console.log(data)
        $('#tag_mitra_table tbody tr').remove()
            if(data.length>0){
                for (let index = 0; index < data.length; index++) {
                if (data[index].status!='IN') {
                        color='#d5483b'
                    } else {
                        color=''
                    }
                    $('#archive_table > tbody:last-child').append('\
                    <tr style="background-color: '+color+'">\
                        <td>'+data[index].id_pm+'</td>\
                        <td>'+data[index].pekerjaan+'</td>\
                        <td>'+data[index].bulan.substring(0, 3).toUpperCase()+'</td>\
                        <td>'+data[index].teritory+'</td>\
                        <td>BOX '+data[index].box+'</td>\
                        <td>\
                            <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history('+data[index].id_pm+')" data-target="#history">History</button>\
                            <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file('+data[index].id_pm+')" data-target="#file" data-arsip-id="'+data[index].id_pm+'">File</button>\
                            <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file('+data[index].id_pm+')" data-target="#hapus">Hapus</button>\
                            <button type="button" class="btn btn-secondary" onclick="qrcode_archive('+data[index].id_pm+')">QR</button>\
                        </td>\
                        </tr>'
                    );
                }
            }else{
                $('#archive_table > tbody:last-child').append('\
                <tr>\
                    <td></td>\
                    <td></td>\
                    <td style="text-align:center">Item Arsip Tidak Ditemukan</td>\
                    <td></td>\
                    <td></td>\
                </tr>');

            }
        },
        error: function() { 
            console.log(data);
        }
    });
}

</script>
@endpush