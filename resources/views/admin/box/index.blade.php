@extends('layouts.app',[
	'title' => 'Box Management',
])
@section('content')

<div class="header-content arsip" style="height: 219px;">
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
            <h1>Lihat Box</h1>
            <p>Data lengkap Box</p>
        </div>
    </div>    
</div>

<div class="container-content" style="position: relative; margin-top: -20px;" >
    <div class="row">
        <div class="col-md-12">
            <div class="card-custom">
                <div class="conten-custom">
                    <div class="row  title-header">
                        <div class="col-md-6">
                            <h3>
                                Detail Arsip BOX
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group search-box">
                                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#add-box" style="margin-right: 20px;">
                                    Tambah Box <i class="fa fa-plus"></i>
                                </button>
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
                                <th scope="col">Nama Box</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Kuota Terpakai</th>
                                <th class="action" scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($boxes as $key=> $box)
                                <tr>
                                  <td>{{$box->nama}}</td>
                                  <td>{{$box->unit=='IF'?'Imprest Fund':'Tagihan Mitra'}}</td>
                                  <td>{{($archive[$key]).' Dari '.$box->kuota}}</td>
                                  <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="modal_edit_box('{{$box->id}}')" data-target="#edit-box">Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_box('{{$box->nama}}')" data-target="#hapus_box">Hapus</button>
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
<!-- Modal Input Arsip Masuk -->
@include('admin.box.modal-add')
@include('admin.box.modal-edit')
@include('admin.box.modal-hapus')
@include('admin.box.modal-sukses-hapus')

<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@push('js')

<!-- Sibar JS -->
<script>
    $(".nav-link").addClass(["collapsed","active"]);
    $("#unit a:first-child").addClass("collapsed").attr("aria-expanded", "true");
    $("#unit").addClass("show");
</script>

<script>
    function modal_delete_box(box){
        $("#nama_box").html(box);
    }
    function delete_box(){
        var box=$("#nama_box").html()
        $("#nama_box_sukses").html(box);
        $.ajax({
            type: 'GET',
            url: '/delete-box/'+box,
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
    function modal_edit_box(box_id){
        const options = ["Finance & Billco", "Commerce", "Construction","HCM"];
        $.ajax({
            type: 'GET',
            url: '/box-detail/'+box_id,
            success: function (data) {
                $('#box_id').val(data.id)
                $('#box_name').val(data.nama)
                $('#box_kuota').val(data.kuota)
                for (let index = 0; index < options.length; index++) {
                    console.log(data.subunit==options[index])
                    $('#type_box').append('<option value="">Pilih Unit Arsip</option>');
                    if(data.subunit==options[index]){
                        $('#type_box').append('<option selected value="'+options[index]+'">'+options[index]+'</option>');   
                    }else{
                        $('#type_box').append('<option value="'+options[index]+'">'+options[index]+'</option>');   
                    }
                }
                if(data.unit=='IF'){
                    $('#type_archive').append('<option selected value="IF">Imprest Fund</option>');
                    $('#type_archive').append('<option value="TM">Tagihan Mitra</option>');
                    
                }else{
                    $('#type_archive').append('<option value="IF">Imprest Fund</option>');
                    $('#type_archive').append('<option selected value="TM">Tagihan Mitra</option>');
                }
            },
            error: function() { 
                console.log(data);
            }
        });
    }
</script>
@endpush