@extends('layouts.app',[
	'title' => 'Impress Fund',
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
                            <select class="form-control" id="teritory">
                            <option value="">Pilih Teritory</option>
                            <option value="JATIM1">JATIM1</option>
                            <option value="JATIM2">JATIM2</option>
                            <option value="JATIM3">JATIM3</option>
                            <option value="BALI">BALI</option>
                            <option value="NUSRA">NUSRA</option>
                            <option value="REGIONAL">REGIONAL</option>
                            <option value="BALNUS">BALNUS</option>
                            <option value="GEMA">GEMA</option>
                            <option value="SCM">SCM</option>
                            <option value="SURABAYA">SURABAYA</option>
                            <option value="GRESIK">GRESIK</option>
                            <option value="SURAMADU">SURAMADU</option>
                            <option value="SIDOARJO">SIDOARJO</option>
                            <option value="PASURUAN">PASURUAN</option>
                            <option value="MALANG">MALANG</option>
                            <option value="KEDIRI">KEDIRI</option>
                            <option value="MADIUN">MADIUN</option>
                            <option value="JEMBER">JEMBER</option>
                            <option value="DENPASAR">DENPASAR</option>
                            <option value="SINGARAJA">SINGARAJA</option>
                            <option value="KUPANG">KUPANG</option>
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
                    <div class="row title-header">
                        <div class="col-md-6">
                            <h3>
                                Detail Arsip IMPRESS FUND
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
                        <table class="table table-sm table-hover tabel-arsip" id="archive_table">
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
                                <tr style="background-color: {{$archive->status!='IN'?'#d5483b;':''}}">
                                  <td>{{$archive->id_pm}}</td>
                                  <td>{{strtoupper(substr($archive->bulan,0,3))}}</td>
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
            <button type="button" class="btn btn-primary" id="downloadPNG"  style="background-color: #1180BF; width: 100%" data-dismiss="modal">Print</button>
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
        <div class="modal-body" style="display: block;margin: auto">
            <div id="qrcode">

            </div>
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
        <button type="button" class="btn btn-primary" onclick="download_qrcode_fun()"  style="background-color: #1180BF; width: 100%" data-dismiss="modal">Print</button>
        </div>
    </div>
    </div>
</div>

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

<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@push('js')
<script src="/template/js/qrcode.js"></script>
<script>
    

    $(document).ready(function(){


        $('#barcode_modal').modal();
        $('#tambah_file').hide();

        $('#btn_tambah_file').click(function(){
            $('#tambah_file').show();
        });

        

        $('#tahun').on('change', function() {
            var tahun=this.value;
            var bulan=$('#bulan').val();
            var teritory=$('#teritory').val();
            var box=$('#box').val();
            archives(tahun,bulan,teritory,box)
        });

        $('#bulan').on('change', function() {
            var tahun=$('#tahun').val();
            var bulan=this.value;
            var teritory=$('#teritory').val();
            var box=$('#box').val();
            archives(tahun,bulan,teritory,box)
        });

        $('#teritory').on('change', function() {
            var tahun=$('#tahun').val();
            var bulan=$('#bulan').val();
            var teritory=this.value;
            var box=$('#box').val();
            archives(tahun,bulan,teritory,box)
        });

        $('#box').on('change', function() {
            var tahun=$('#tahun').val();
            var bulan=$('#bulan').val();
            var teritory=$('#teritory').val();
            var box=this.value;
            archives(tahun,bulan,teritory,box)
        });

        $('#btn_reset_filter').click(function(){
            $("select").each(function() { this.selectedIndex = 0 });
            var tahun=$('#tahun').val();
            var bulan=$('#bulan').val();
            var teritory=$('#teritory').val();
            var box=this.value;
            archives(tahun,bulan,teritory,box)
        })

        function archives(tahun,bulan,teritory,box){
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
                    box: box,
                },
                success: function (data) {
                    console.log(data)
                    $('#archive_table tbody tr').remove()
                    if(data.length>0){
                        for (let index = 0; index < data.length; index++) {
                            $('#archive_table > tbody:last-child').append('\
                                <tr>\
                                <td>'+data[index].id_pm+'</td>\
                                <td>'+data[index].bulan.substring(0, 3).toUpperCase()+'</td>\
                                <td>'+data[index].teritory+'</td>\
                                <td>BOX '+data[index].box+'</td>\
                                <td>\
                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history('+data[index].id_pm+')" data-target="#history">History</button>\
                                            <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file('+data[index].id_pm+')" data-target="#file" data-arsip-id="'+data[index].id_pm+'">File</button>\
                                            <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file('+data[index].id_pm+')" data-target="#hapus">Hapus</button>\
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

        $('#qrcode_archive').click(function(){

        })

    });

    function cari_arsip(){
        var cari=$('#cari_arsip').val()
        console.log(cari)
        $.ajax({
            type: 'GET',
            url: '/cari-impress-fund/'+cari,
            success: function (data) {
                console.log(data)
                    $('#archive_table tbody tr').remove()
                    if(data.length>0){
                        for (let index = 0; index < data.length; index++) {
                            $('#archive_table > tbody:last-child').append('\
                                <tr>\
                                <td>'+data[index].id_pm+'</td>\
                                <td>'+data[index].bulan.substring(0, 3).toUpperCase()+'</td>\
                                <td>'+data[index].teritory+'</td>\
                                <td>BOX '+data[index].box+'</td>\
                                <td>\
                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history('+data[index].id_pm+')" data-target="#history">History</button>\
                                            <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file('+data[index].id_pm+')" data-target="#file" data-arsip-id="'+data[index].id_pm+'">File</button>\
                                            <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file('+data[index].id_pm+')" data-target="#hapus">Hapus</button>\
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

    function qrcode_archive(archive_id){
        $('#qrcode canvas').remove()
        $('#qrcode img').remove()
        $.ajax({
            type: 'GET',
            url: '/qrcode-impress-fund/'+archive_id,
            success: function (data) {
                $('#qrcode_modal').modal();
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    text: JSON.stringify([data.id_pm,data.bulan,data.teritory,data.box]),
                    width: 300,
                    height: 300,
                });
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
    
    function add_file(archive_id){
        $('#archive_id').val(archive_id)
        $('#tabel-arsip tbody tr').remove()
        $.ajax({
            type: 'GET',
            url: '/impress-fund/'+archive_id,
            success: function (data) {
                console.log(data.length)
                if(data.length>0){
                    for (let index = 0; index < data.length; index++) {
                        var tanggal=data[index].created_at
                        console.log(tanggal)
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
    function open_history(archive_id){
        $('#tabel-history tbody tr').remove()
        $.ajax({
            type: 'GET',
            url: '/history-archive/'+archive_id,
            success: function (data) {
                console.log(data.length)
                if(data.length>0){
                    for (let index = 0; index < data.length; index++) {
                        console.log(data[index].status)
                        var tanggal=data[index].created_at
                        console.log(tanggal)
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
        $('#tabel_archive_out tbody tr').remove()
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
                    $('#tabel_archive_out tbody tr').remove()
                    $('#tabel_archive_out > tbody:last-child').append('\
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
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 1000); 
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


    function download_qrcode_fun(e){
        console.log('jaya')
        const canvas = document.createElement("canvas");
        const svg = document.getElementById('qrcode').getElementsByTagName('img')
        const base64doc = btoa(unescape(encodeURIComponent(svg.outerHTML)));
        const w = parseInt(300);
        const h = parseInt(300);
        const img_to_download = document.createElement('img');
        img_to_download.src = svg[0].currentSrc;
        console.log(base64doc);
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
    
</script>
@endpush