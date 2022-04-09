<form action="{{ route('tag_mitra.save') }}" method="POST">@csrf
    <div class="modal fade" id="input-arsip-masuk" tabindex="-1" role="dialog" aria-labelledby="input-arsip-masuk" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title modal-title-custom" id="input-arsip-masuk">Input Arsip Masuk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-2">
                    <label for="tahun-input-arsip-masuk">Periode Arsip</label>
                    <div class="form-group">
                        <select class="form-control" id="tahun-input-arsip-masuk" name="periode">
                            <option>Tahun</option>
                            <option value="">Tahun</option>
                            @for ($i = 2015; $i < date('Y'); $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label>Bulan</label>
                        <select class="form-control" id="bulan-input-arsip-masuk" name="bulan">
                            <option>Bulan</option>
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
                  </div>
                  <div class="col-md-3">
                    <label for="teritory-input-arsip-masuk">Pekerjaan</label>
                    <div class="form-group">
                        <select class="form-control" id="teritory-input-arsip-masuk" name="pekerjaan">
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
                  </div>
                  <div class="col-md-2">
                    <label for="teritory-input-arsip-masuk">Arsip Area</label>
                    <div class="form-group">
                        <select class="form-control" id="box-penyimpanan-arsip-input-arsip-masuk" name="teritory">
                            <option>Pilih Area</option>
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
                  </div>
                  <div class="col-md-3">
                    <label for="teritory-input-arsip-masuk">Box Penyimpanan Arsip</label>
                    <div class="form-group">
                        <select class="form-control" id="box-penyimpanan-arsip-input-arsip-masuk" name="box">
                            <option value="">Pilih Box Penyimpanan Arsip</option>
                            @foreach ($boxes as $box)
                            <option value="{{$box->nama}}">{{$box->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
              </div>
              <button type="submit" class="button">Submit Arsip & Generate Barcode</button>
            </div>
          </div>
        </div>
    </div>
</form>
