@extends('layouts.app',[
	'title' => 'Impress Fund',
])

@section('content')

<div class="header-content arsip">
   
    <div class="row">
        <div class="col-md-6">
            <h1>Lihat Arsip IMPRESS FUND</h1>
            <p>Data lengkap arsip IMPRESS FUND</p>
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
            <div class="card-custom">
                <div class="conten-custom sidebar-content">
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
                            <select class="form-control" id="teritory">
                            <option>Pilih Teritory</option>
                            <option>JATIM1</option>
                            <option>JATIM2</option>
                            <option>JATIM3</option>
                            <option>BALI</option>
                            <option>NUSRA</option>
                            <option>REGIONAL</option>
                            <option>BALNUS</option>
                            <option>GEMA</option>
                            <option>SCM</option>
                            <option>SURABAYA</option>
                            <option>GRESIK</option>
                            <option>SURAMADU</option>
                            <option>SIDOARJO</option>
                            <option>PASURUAN</option>
                            <option>MALANG</option>
                            <option>KEDIRI</option>
                            <option>MADIUN</option>
                            <option>JEMBER</option>
                            <option>DENPASAR</option>
                            <option>SINGARAJA</option>
                            <option>KUPANG</option>
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
                    <div class="row title-header">
                        <div class="col-md-6">
                            <h3>
                                Detail Arsip IMPRESS FUND
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
                                  <td>{{strtoupper(substr($archive->bulan,0,3))}}</td>
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


{{-- Modal Barcode --}}

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
                        <td><b>Periode</b></td>
                        <td style="text-align: right">{{json_decode(Session::get('barcode'))[1]}}</td>
                    </tr>
                    <tr>
                        <td><b>Teritory</b></td>
                        <td style="text-align: right">{{json_decode(Session::get('barcode'))[2]}}</td>
                    </tr>
                    <tr>
                        <td><b>Box</b></td>
                        <td style="text-align: right">{{json_decode(Session::get('barcode'))[3]}}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary"  style="background-color: #1180BF; width: 100%" data-dismiss="modal">Print</button>
            </div>
        </div>
        </div>
    </div>
@endif

<!-- Modal Input Arsip Masuk -->
@include('admin.kelola-arsip.impress-fund.modal-arsip-masuk')

<!-- Modal Input Arsip Keluar -->
@include('admin.kelola-arsip.impress-fund.modal-arsip-keluar')

<!-- Modal Excel Import -->
@include('admin.kelola-arsip.impress-fund.modal-excel-import')

<!-- Modal Excel History -->
@include('admin.kelola-arsip.impress-fund.modal-history')

<!-- Modal Excel Hapus -->
@include('admin.kelola-arsip.impress-fund.modal-hapus')

<!-- Modal Excel File -->
@include('admin.kelola-arsip.impress-fund.modal-file')


@endsection

@push('js')
<script>
    $(document).ready(function(){
        $('#barcode_modal').modal();
        $('#tambah_file').hide();

        $('#btn_tambah_file').click(function(){
            $('#tambah_file').show();
        });

    });
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
                        $('#tabel-arsip > tbody:last-child').append('\
                        <tr>\
                            <td><?=date("l F Y H:i",strtotime("2022-02-14T22:32:42.000000Z"));?> WIB</td>\
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
    function open_history(archive_id){
        $('#tabel-history tr').remove()
        $.ajax({
            type: 'GET',
            url: '/history-archive/'+archive_id,
            success: function (data) {
                console.log(data.length)
                if(data.length>0){
                    for (let index = 0; index < data.length; index++) {
                        console.log(data[index].status)
                        $('#tabel-history > tbody:last-child').append('\
                        <tr>\
                            <td>12 Januari 2022 08:00 WIB</td>\
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
        $('#tabel_archive_out tr').remove()
        $.ajax({
            type: 'GET',
            url: '/out-archive/'+id_archive,
            success: function (data) {
                console.log(data)
                if(data.length>0){
                    for (let index = 0; index < data.length; index++) {
                        $('#tabel_archive_out > tbody:last-child').append('\
                        <tr>\
                        <td>'+data[index].id_pm+'</td>\
                        <td>'+data[index].bulan.substring(0, 3).toUpperCase()+'</td>\
                        <td>'+data[index].teritory+'</td>\
                        <td>BOX '+data[index].box+'</td>\
                        <td>\
                          <button type="button" class="button" style="height: 29px" data-toggle="modal" data-target="#input-arsip-confrim-keluar" data-dismiss="modal" onclick="modal_archive_out('+data[index].id_pm+')" aria-label="Close">Arsip Keluar</button>\
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

    function modal_archive_out(id_archive){
        $("#archive_id_modal").html(id_archive);
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

    function modal_delete_file(archive_id){
        console.log(archive_id)
        $("#archive_id_modal_hapus").html(archive_id);
    }

    function delete_file(){
        var id_archive=$("#archive_id_modal_hapus").html()
        $("#archive_id_sukses_delete").html(id_archive);
        $.ajax({
            type: 'GET',
            url: '/delete-impress-archive/'+id_archive,
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
</script>
@endpush