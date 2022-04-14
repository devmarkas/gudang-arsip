@extends('layouts.app',[
'title' => 'Imprest Fund',
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
                visibility: hidden;
            }

            #printSection,
            #printSection * {
                visibility: visible;
                /* width: 100% */
            }

            #printSection {
                position: absolute;
                left: 0;
                top: 0;
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
                        <span>{{ $error }}</span>
                        <button type="button" style="width: 30px; height: 30px;" class="close ml-3" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            </div>
        @endif
        @if (Session::has('error_import'))
            <div id="validasi" class="peringatan">
                <div class="alert alert-danger">
                    <span>{{ Session::get('error_import') }}</span>
                    <button type="button" style="width: 30px; height: 30px;" class="close ml-3" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <h1>Lihat Arsip Imprest Fund</h1>
                <p>Data lengkap arsip Imprest Fund</p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <button type="button" data-toggle="modal" data-target="#input-arsip-masuk">
                            <img src="{{ asset('template') }}/img/icon-export-arsip.svg" alt="">
                            <p>Input Arsip Masuk</p>
                        </button>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <button type="button" data-toggle="modal" data-target="#input-arsip-keluar-if">
                            <img src="{{ asset('template') }}/img/icon-arsip-keluar.svg" alt="">
                            <p>Input Arsip Keluar</p>
                        </button>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <button type="button" data-toggle="modal" data-target="#input-scan-barcode">
                            <img src="{{ asset('template') }}/img/icon-scan-arsip.svg" alt="">
                            <p>Scan Arsip</p>
                        </button>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <button type="button" data-toggle="modal" data-target="#excel-import">
                            <img src="{{ asset('template') }}/img/icon-excel-import.svg" alt="">
                            <p>Excel Import</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-content" style="position: relative; margin-top: -20px;">
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
                                    <option value="">Pilih Tahun</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="bulan">
                                    <option value="">Pilih Bulan</option>
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
                                    <option value="">Pilih Territory</option>
                                    <option value="BALI">BALI</option>
                                    <option value="BALNUS">BALNUS</option>
                                    <option value="JATIM">JATIM</option>
                                    <option value="JATIM1">JATIM1</option>
                                    <option value="JATIM2">JATIM2</option>
                                    <option value="JATIM3">JATIM3</option>
                                    <option value="NUSRA">NUSRA</option>
                                    <option value="REGIONAL">REGIONAL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="box_select" name="box">
                                    <option value="">Pilih Box Penyimpanan Arsip</option>
                                    @foreach ($boxes as $box)
                                        <option value="{{ $box->nama }}">{{ $box->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-secondary" type="button" style="width: 100%" id="btn_reset_filter">Reset
                                Filter</button>
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
                                    Detail Arsip Imprest Fund
                                </h3>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group search-box">
                                    <input type="text" class="form-control" placeholder="Cari Arsip" id="cari_arsip"
                                        onkeyup="cari_arsip()">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('print_massal_if') }}" target="_blank" class="btn btn-success"><i
                                        class="fa fa-print"></i></a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-hover tabel-arsip" id="archive_table">
                                <thead>
                                    <tr>
                                        <th class="action" scope="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="centang-semua">
                                                <label class="form-check-label">
                                                    
                                                </label>
                                            </div>
                                        </th>
                                        <th class="action" scope="col">ID PM</th>
                                        <th class="action" scope="col">BULAN</th>
                                        <th class="action" scope="col">TERRITORY</th>
                                        <th class="action" scope="col">BOX</th>
                                        <th class="action" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archives as $archive)
                                        <tr style="background-color: {{ $archive->status != 'IN' ? '#d5483b;' : '' }}">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input checkitem" type="checkbox" value="" id="centang">
                                                    <label class="form-check-label">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $archive->id_pm }}</td>
                                            <td>{{ strtoupper($archive->bulan) }}</td>
                                            <td>{{ $archive->teritory }}</td>
                                            <td>{{ $archive->box }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    onclick="open_history({{ $archive->id_pm }})"
                                                    data-target="#history">History</button>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    onclick="add_file({{ $archive->id_pm }})" data-target="#file"
                                                    data-arsip-id="{{ $archive->id_pm }}">File</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    onclick="modal_delete_file({{ $archive->id_pm }})"
                                                    data-target="#hapus">Hapus</button>
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="qrcode_archive({{ $archive->id_pm }})">QR</button>
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

    @if (Session::has('succes_import'))
        <div class="modal fade" id="barcode_modal_import" tabindex="-1" role="dialog"
            aria-labelledby="barcode_modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p style="text-align: left;" id="barcode_modalLabel">Barcode Generated</p>
                    </div>
                    <div class="modal-body" id="print_qrcode_import">
                        @foreach (json_decode(Session::get('succes_import')) as $barcode)
                            <div class="item-barcode" id="item-barcode">
                                <div class="mt-5">
                                    @php
                                        echo DNS1D::getBarcodeSVG($barcode->id_pm, 'CODABAR', 3, 33, '#000000');
                                    @endphp
                                </div>
                                <table style="width: 100%">
                                    <tr>
                                        <td><b>ID PM</b></td>
                                        <td style="text-align: right">{{ $barcode->id_pm }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Box</b></td>
                                        <td style="text-align: right">{{ $barcode->box }}</td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary" style="background-color: #1180BF; width: 100%" target="_blank"
                            href="/print/{{ Session::get('succes_import') }}">Print</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Session::has('barcode'))
        <input type="hidden" name="text_barcode" id="text_barcode" value="{{ Session::get('barcode') }}">
        <div class="modal fade" id="barcode_modal" tabindex="-1" role="dialog" aria-labelledby="barcode_modalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title modal-title-custom" style="text-align: left;" id="barcode_modalLabel">Barcode
                            Generated</h5>
                    </div>
                    <div class="modal-body" id="print_qrcode_input">
                        <div class="mt-5">
                            <div class="d-flex justify-content-center">
                                @php
                                    echo DNS1D::getBarcodeSVG(json_decode(Session::get('barcode'))[0], 'CODABAR', 3, 33, '#000000');
                                @endphp
                            </div>
                            <table class="" style="width: 100%">
                                <tr>
                                    <td><b>ID PM</b></td>
                                    <td style="text-align: right">{{ json_decode(Session::get('barcode'))[0] }}</td>
                                </tr>
                                <tr>
                                    <td><b>Box</b></td>
                                    <td style="text-align: right">{{ json_decode(Session::get('barcode'))[3] }}</td>
                                </tr>
                            </table>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary" style="background-color: #1180BF; width: 100%" target="_blank"
                            href="/print_single/{{ Session::get('barcode') }}">Print</a>

                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade" id="qrcode_modal" tabindex="-1" role="dialog" aria-labelledby="barcode_modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p style="text-align: left;" id="barcode_modalLabel">Barcode Generated</p>
                </div>
                <div class="modal-body" id="print_qrcode" style="display: block;margin: auto">
                    <img id="barcode" />
                    <table style="width: 100%">
                        <tr>
                            <td><b>ID PM</b></td>
                            <td style="text-align: right" id="qr_code_id_pm"></td>
                        </tr>
                        <tr>
                            <td><b>Box</b></td>
                            <td style="text-align: right" id="qr_code_box"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="print_barcode('print_qrcode')"
                        style="background-color: #1180BF; width: 100%" data-dismiss="modal">Print</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Input Arsip Masuk -->
    @include('admin.kelola-arsip.impress-fund.modal-arsip-masuk')

    @include('admin.kelola-arsip.impress-fund.modal-scan-barcode')
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
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.3.20/JsBarcode.all.min.js"></script>
    <script src="/template/js/print.js"></script>

    <!-- Checkbox JS -->
    <script>
		// fungsi saat ingin di check all atau dipilih semua
		$("#centang-semua").change(function(){
			$(".checkitem").prop("checked", $(this).prop("checked"))
		})
		// berfungsi untuk mengubah beberapa item checkbox terpilih(checklist) semua atau tidak terpilih (unchecklist)
		$(".checkitem").change(function(){
			if($(this).prop("checked")==false){
				$("#centang-semua").prop("checked",false)
			}
			// saat beberapa item terpilih dan hampir semua maka akan pada checkbox yang memiliki id centang-semua terchecklist
			if($(".checkitem:checked").length == $(".checkitem").length){
				$("#centang-semua").prop("checked",true)
			}
		})
	</script>

    <!-- Sibar JS -->
    <script>
        $(".nav-link").addClass(["collapsed", "active"]);
        $("#unit a:first-child").addClass("collapsed").attr("aria-expanded", "true");
        $("#finance-billco").addClass("show");
        $("#unit").addClass("show");
    </script>

    <script>
        function print_barcode(elem) {
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

        $('#inputGroupFile02').change(function() {
            var filename = $('#inputGroupFile02').val();
            if (filename.substring(3, 11) == 'fakepath') {
                filename = filename.substring(12);
            } // For Remove fakepath
            $("label[for='inputGroupFile02']").html(filename);
            if (filename == "") {
                $("label[for='file_default']").text('No File Choosen');
            }
        });

        $(document).ready(function() {


            $('#barcode_modal_import').modal();
            $('#barcode_modal').modal();
            $('#tambah_file').hide();

            $('#btn_tambah_file').click(function() {
                $('#tambah_file').show();
            });



            $('#tahun').on('change', function() {
                var tahun = this.value;
                var bulan = $('#bulan').val();
                var teritory = $('#teritory').val();
                var box = $('#box_select').val();
                archives(tahun, bulan, teritory, box)
            });

            $('#bulan').on('change', function() {
                var tahun = $('#tahun').val();
                var bulan = this.value;
                var teritory = $('#teritory').val();
                var box = $('#box_select').val();
                archives(tahun, bulan, teritory, box)
            });

            $('#teritory').on('change', function() {
                var tahun = $('#tahun').val();
                var bulan = $('#bulan').val();
                var teritory = this.value;
                var box = $('#box_select').val();
                archives(tahun, bulan, teritory, box)
            });

            $('#box_select').on('change', function() {
                var tahun = $('#tahun').val();
                var bulan = $('#bulan').val();
                var teritory = $('#teritory').val();
                var box = this.value;
                archives(tahun, bulan, teritory, box)
            });

            $('#btn_reset_filter').click(function() {
                $("select").each(function() {
                    this.selectedIndex = 0
                });
                var tahun = $('#tahun').val();
                var bulan = $('#bulan').val();
                var teritory = $('#teritory').val();
                var box = $('#box_select').val();
                archives(tahun, bulan, teritory, box)
            })

            function archives(tahun, bulan, teritory, box) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/filter-impress-fund',
                    data: {
                        tahun: tahun,
                        bulan: bulan,
                        teritory: teritory,
                        box: box,
                        type: 'IF'
                    },
                    success: function(data) {
                        console.log(data)
                        $('#archive_table tbody tr').remove()
                        if (data.length > 0) {
                            var color = ''
                            for (let index = 0; index < data.length; index++) {
                                if (data[index].status != 'IN') {
                                    color = '#d5483b'
                                } else {
                                    color = ''
                                }
                                $('#archive_table > tbody:last-child').append('\
                                                        <tr style="background-color: ' + color + '">\
                                                        <td>' + data[index].id_pm + '</td>\
                                                        <td>' + data[index].bulan.toUpperCase() + '</td>\
                                                        <td>' + data[index].teritory + '</td>\
                                                        <td>' + data[index].box +
                                    '</td>\
                                                        <td>\
                                                            <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history(' +
                                    data[index].id_pm +
                                    ')" data-target="#history">History</button>\
                                                            <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file(' +
                                    data[index]
                                    .id_pm + ')" data-target="#file" data-arsip-id="' + data[index]
                                    .id_pm +
                                    '">File</button>\
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file(' +
                                    data[index].id_pm +
                                    ')" data-target="#hapus">Hapus</button>\
                                                            <button type="button" class="btn btn-secondary" onclick="qrcode_archive(' +
                                    data[
                                        index].id_pm + ')">QR</button>\
                                                        </td>\
                                                        </tr>'
                                );
                            }
                        } else {
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

            $('#qrcode_archive').click(function() {

            })

            $('#input-scan-barcode').on('shown.bs.modal', function() {
                $('#scan_archive').focus()
            })

        });

        function cari_arsip() {
            var cari = $('#cari_arsip').val()
            console.log(cari)
            if (cari) {
                var cari = cari
            } else {
                var cari = '%'
            }
            $('#archive_table tbody tr').remove()
            $.ajax({
                type: 'GET',
                url: '/cari-impress-fund/' + cari,
                success: function(data) {
                    $('#archive_table tbody tr').remove()
                    if (data.length > 0) {
                        for (let index = 0; index < data.length; index++) {
                            if (data[index].status != 'IN') {
                                color = '#d5483b'
                            } else {
                                color = ''
                            }
                            $('#archive_table > tbody:last-child').append('\
                                                <tr style="background-color: ' + color + '">\
                                                    <td>' + data[index].id_pm + '</td>\
                                                    <td>' + data[index].bulan.toUpperCase() + '</td>\
                                                    <td>' + data[index].teritory + '</td>\
                                                    <td>' + data[index].box +
                                '</td>\
                                                    <td>\
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history(' +
                                data[index].id_pm +
                                ')" data-target="#history">History</button>\
                                                        <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file(' +
                                data[index].id_pm + ')" data-target="#file" data-arsip-id="' + data[index]
                                .id_pm +
                                '">File</button>\
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file(' +
                                data[index].id_pm +
                                ')" data-target="#hapus">Hapus</button>\
                                                        <button type="button" class="btn btn-secondary" onclick="qrcode_archive(' +
                                data[
                                    index]
                                .id_pm + ')">QR</button>\
                                                    </td>\
                                                    </tr>'
                            );
                        }
                    } else {
                        $('#archive_table > tbody:last-child').append('\
                                            <tr>\
                                                <td></td>\
                                                <td></td>\
                                                <td style="text-align:center">Istem Arsip Tidak Ditemukan</td>\
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

        function qrcode_archive(archive_id) {
            $('#qrcode canvas').remove()
            $('#qrcode img').remove()
            $.ajax({
                type: 'GET',
                url: '/qrcode-impress-fund/' + archive_id,
                success: function(data) {
                    console.log(data.id_pm.toString())
                    $('#qrcode_modal').modal();
                    JsBarcode("#barcode", data.id_pm.toString(), {
                        format: "msi",
                        displayValue: false,
                        lineColor: "#000000",
                    });
                    $('#qr_code_id_pm').html(data.id_pm)
                    $('#qr_code_box').html(data.box)
                },
                error: function() {
                    console.log(data);
                }
            });
        }

        function add_file(archive_id) {
            $('#archive_id').val(archive_id)
            $('#tabel-arsip tbody tr').remove()
            $.ajax({
                type: 'GET',
                url: '/impress-fund/' + archive_id,
                success: function(data) {
                    console.log(data.length)
                    if (data.length > 0) {
                        for (let index = 0; index < data.length; index++) {
                            var tanggal = data[index].created_at
                            var options = {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric'
                            };
                            var today = new Date(tanggal);
                            $('#tabel-arsip > tbody:last-child').append('\
                                                <tr>\
                                                    <td>' + today.toLocaleDateString("en-US", options) + '</td>\
                                                    <td>' + data[index].name + '</td>\
                                                    <td>\
                                                        <a target="_blank" href="/template/img/archive/' + data[index]
                                .file + '" ><img src="{{ asset('template') }}/img/icon-preview.svg" alt=""></a>\
                                                    </td>\
                                                </tr>');
                        }
                    } else {
                        $('#tabel-arsip > tbody:last-child').append('\
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

        function open_history(archive_id) {
            $('#tabel-history tbody tr').remove()
            $.ajax({
                type: 'GET',
                url: '/history-archive/' + archive_id,
                success: function(data) {
                    console.log(data.length)
                    if (data.length > 0) {
                        for (let index = 0; index < data.length; index++) {
                            console.log(data[index].status)
                            var tanggal = data[index].created_at
                            console.log(tanggal)
                            var options = {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric'
                            };
                            var today = new Date(tanggal);
                            $('#tabel-history > tbody:last-child').append('\
                                                <tr>\
                                                    <td>' + today.toLocaleDateString("en-US", options) + '</td>\
                                                    <td>' + data[index].status + '</td>\
                                                    <td>' + data[index].name + '</td>\
                                                </tr>');
                        }
                    } else {
                        console.log('tidak ada')
                    }
                },
                error: function() {
                    console.log(data);
                }
            });
        }

        function find_archive(archive_id) {
            var id_archive = $('#id_archive').val()
            if (id_archive == '') {
                id_archive = 0
            }
            $('#tabel_archive_out tbody tr').remove()
            $.ajax({
                type: 'GET',
                url: '/out-archive/' + id_archive,
                success: function(data) {
                    console.log(data)
                    if (data.length > 0) {
                        for (let index = 0; index < data.length; index++) {
                            $('#tabel_archive_out > tbody:last-child').append('\
                                                <tr>\
                                                <td>' + data[index].id_pm + '</td>\
                                                <td>' + data[index].bulan.toUpperCase() + '</td>\
                                                <td>' + data[index].teritory + '</td>\
                                                <td>' + data[index].box +
                                '</td>\
                                                <td>\
                                                  <button type="button" class="button" style="height: 29px" data-toggle="modal" data-target="#input-arsip-confrim-keluar" data-dismiss="modal" onclick="modal_archive_out(' +
                                data[index].id_pm + ')" aria-label="Close">Arsip Keluar</button>\
                                                </td>\
                                              </tr>'
                            );
                        }
                    } else {
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

        function scan_barcode(archive_id) {
            var id_archive = $('#scan_archive').val()
            if (id_archive == '') {
                id_archive = 0
            }
            $('#tabel_scan_archive tbody tr').remove()
            $.ajax({
                type: 'GET',
                url: '/scan-if-archive/' + id_archive,
                success: function(data) {
                    // console.log(data)
                    if (data.length > 0) {
                        $('#tabel_scan_archive tbody tr').remove()
                        for (let index = 0; index < data.length; index++) {
                            $('#tabel_scan_archive > tbody:last-child').append('\
                                                <tr>\
                                                <td>' + data[index].id_pm + '</td>\
                                                <td>' + data[index].bulan.toUpperCase() + '</td>\
                                                <td>' + data[index].teritory + '</td>\
                                                <td>' + data[index].box +
                                '</td>\
                                                <td>\
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="open_history(' +
                                data[index].id_pm +
                                ')" data-target="#history">History</button>\
                                                    <button type="button" class="btn btn-success" data-toggle="modal" onclick="add_file(' +
                                data[index].id_pm + ')" data-target="#file" data-arsip-id="' + data[index]
                                .id_pm +
                                '">File</button>\
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" onclick="modal_delete_file(' +
                                data[index].id_pm +
                                ')" data-target="#hapus">Hapus</button>\
                                                    <button type="button" class="btn btn-secondary" onclick="qrcode_archive(' +
                                data[
                                    index]
                                .id_pm + ')">QR</button>\
                                                </td>\
                                              </tr>'
                            );
                        }
                    } else {
                        $('#tabel_scan_archive tbody tr').remove()
                        $('#tabel_scan_archive > tbody:last-child').append('\
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

        function modal_archive_out(id_archive) {
            $("#archive_id_modal").html(id_archive);
        }

        function archive_out() {
            var id_archive = $("#archive_id_modal").html()
            $("#archive_id_take_out").html(id_archive);
            $.ajax({
                type: 'GET',
                url: '/take-out-archive/' + id_archive,
                success: function(data) {
                    setTimeout(function() { // wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 1000);
                },
                error: function() {
                    console.log(data);
                }
            });
        }

        function modal_delete_file(archive_id) {
            console.log(archive_id)
            $("#archive_id_modal_hapus").html(archive_id);
        }

        function delete_file() {
            var id_archive = $("#archive_id_modal_hapus").html()
            $("#archive_id_sukses_delete").html(id_archive);
            $.ajax({
                type: 'GET',
                url: '/delete-impress-archive/' + id_archive,
                success: function(data) {
                    setTimeout(function() { // wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 1000);
                },
                error: function() {
                    console.log(data);
                }
            });
        }

        // function print_batch_barcode(data){
        //     console.log(data)
        //     $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //     console.log(data)
        //     $.ajax({
        //         type: 'POST',
        //         data: {data},
        //         url: '/print',
        //         success: function (data) {

        //         },
        //         error: function() {
        //             console.log(data);
        //         }
        //     });
        // }
    </script>
@endpush
