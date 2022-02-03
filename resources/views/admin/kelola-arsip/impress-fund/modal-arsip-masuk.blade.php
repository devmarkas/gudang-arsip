<form action="">
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
                        <select class="form-control" id="tahun-input-arsip-masuk">
                            <option>Tahun</option>
                            <option value="tahun-input-arsip-masuk-2020">2022</option>
                            <option value="tahun-input-arsip-masuk-2021">2021</option>
                            <option value="tahun-input-arsip-masuk-2020">2020</option>
                            <option value="tahun-input-arsip-masuk-2019">2019</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label></label>
                        <select class="form-control mt-2" id="bulan-input-arsip-masuk">
                            <option>Bulan</option>
                            <option value="bulan-input-arsip-masuk-januari">Januari</option>
                            <option value="bulan-input-arsip-masuk-februari">Februari</option>
                            <option value="bulan-input-arsip-masuk-maret">Maret</option>
                            <option value="bulan-input-arsip-masuk-april">April</option>
                            <option value="bulan-input-arsip-masuk-mei">Mei</option>
                            <option value="bulan-input-arsip-masuk-juni">Juni</option>
                            <option value="bulan-input-arsip-masuk-juli">Juli</option>
                            <option value="bulan-input-arsip-masuk-agustus">Agustus</option>
                            <option value="bulan-input-arsip-masuk-september">September</option>
                            <option value="bulan-input-arsip-masuk-oktober">Oktober</option>
                            <option value="bulan-input-arsip-masuk-november">November</option>
                            <option value="bulan-input-arsip-masuk-desember">Desember</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="teritory-input-arsip-masuk">Arsip Teritory</label>
                    <div class="form-group">
                        <select class="form-control" id="teritory-input-arsip-masuk">
                            <option>Teritory</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label for="teritory-input-arsip-masuk">Box Penyimpanan Arsip</label>
                    <div class="form-group">
                        <select class="form-control" id="box-penyimpanan-arsip-input-arsip-masuk">
                            <option>Pilih Box Penyimpanan Arsip</option>
                        </select>
                    </div>
                  </div>
              </div>
              <button type="button" class="button">Submit Arsip & Generate Barcode</button>
            </div>
          </div>
        </div>
    </div>
</form>
