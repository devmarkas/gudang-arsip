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
                                @foreach ($archives as $archive)
                                <tr>
                                  <td>{{$archive->id_pm}}</td>
                                  <td>{{$archive->pekerjaan}}</td>
                                  <td>{{strtoupper($archive->bulan)}}</td>
                                  <td>{{$archive->teritory}}</td>
                                  <td>{{$archive->box}}</td>
                                  <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history({{$archive->id_pm}})" data-target="#history">History</button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file({{$archive->id_pm}})" data-target="#file" data-arsip-id="{{$archive->id_pm}}">File</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file({{$archive->id_pm}})" data-target="#hapus">Hapus</button>
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
        <div class="modal-body" style="display: block;margin: auto">
            {!!QrCode::size(300)->generate(Session::get('barcode'));!!}
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
        <button type="button" class="btn btn-primary" id="downloadPNG"  style="background-color: #1180BF; width: 100%" data-dismiss="modal">Print</button>
        </div>
    </div>
    </div>
</div>
@endif
<!-- Modal Input Arsip Masuk -->
@include('admin.kelola-arsip.tag-mitra.modal-arsip-masuk')

<!-- Modal Input Arsip Masuk -->
@include('admin.kelola-arsip.tag-mitra.modal-arsip-keluar')


<!-- Modal Excel History -->
@include('admin.kelola-arsip.tag-mitra.modal-history')

<!-- Modal Excel File -->
@include('admin.kelola-arsip.tag-mitra.modal-file')

<!-- Modal Excel Hapus -->
@include('admin.kelola-arsip.tag-mitra.modal-hapus')

@endsection

@push('js')
<script>
$(document).ready(function(){
    //Show  Modal If Exist
    $('#barcode_modal').modal();
    //Hide Button Tambah File
    $('#tambah_file').hide();
    //Show if clicked
    $('#btn_tambah_file').click(function(){
        $('#tambah_file').show();
    });
});

// Add File and open List File in Archive
function add_file(archive_id){
    $('#archive_id').val(archive_id)
    $('#tabel-arsip tr').remove()
    $.ajax({
        type: 'GET',
        url: '/impress-fund/'+archive_id,
        success: function (data) {
            console.log(data.length)
            if(data.length>0){
                for (let index = 0; index < data.length; index++) {
                    var tanggal=data[index].created_at
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    var today  = new Date(tanggal);
                    $('#tabel-arsip > tbody:last-child').append('\
                    <tr>\
                        <td>'+today.toLocaleDateString("en-US", options)+' WIB</td>\
                        <td>'+data[index].name+'</td>\
                        <td>\
                        <img src="{{asset ("template")}}/img/icon-preview.svg" alt="">\
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
//open History
function open_history(archive_id){
    $('#tabel-history tr').remove()
    $.ajax({
        type: 'GET',
        url: '/history-archive/'+archive_id,
        success: function (data) {
            
            if(data.length>0){
                for (let index = 0; index < data.length; index++) {
                    var tanggal=data[index].created_at
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    var today  = new Date(tanggal);
                    $('#tabel-history > tbody:last-child').append('\
                    <tr>\
                        <td>'+today.toLocaleDateString("en-US", options)+' WIB</td>\
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

//Download SVG Barcode
function downloadSVGAsPNG(e){
    const canvas = document.createElement("canvas");
    const svg = document.querySelector('svg');
    const base64doc = btoa(unescape(encodeURIComponent(svg.outerHTML)));
    const w = parseInt(svg.getAttribute('width'));
    const h = parseInt(svg.getAttribute('height'));
    const img_to_download = document.createElement('img');
    img_to_download.src = 'data:image/svg+xml;base64,' + base64doc;
    console.log(w, h);
    img_to_download.onload = function () {    
        canvas.setAttribute('width', w);
        canvas.setAttribute('height', h);
        const context = canvas.getContext("2d");
        //context.clearRect(0, 0, w, h);
        context.drawImage(img_to_download,0,0,w,h);
        const dataURL = canvas.toDataURL('image/png');
        if (window.navigator.msSaveBlob) {
        window.navigator.msSaveBlob(canvas.msToBlob(), "download.png");
        e.preventDefault();
        } else {
        const a = document.createElement('a');
        const my_evt = new MouseEvent('click');
        a.download = 'download.png';
        a.href = dataURL;
        a.dispatchEvent(my_evt);
        }
        //canvas.parentNode.removeChild(canvas);
    }  
}
const downloadPNG = document.querySelector('#downloadPNG');
downloadPNG.addEventListener('click', downloadSVGAsPNG);
</script>
@endpush