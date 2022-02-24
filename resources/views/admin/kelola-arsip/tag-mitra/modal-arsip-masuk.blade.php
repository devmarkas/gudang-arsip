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
                            <option value="2020">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label></label>
                        <select class="form-control mt-2" id="bulan-input-arsip-masuk" name="bulan">
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
                            <option>Pilih Pekerjaan</option>
                            <option value="25%"> 25%</option>
                            <option value="75%"> 75%</option>
                            <option value="PSB">PSB</option>
                            <option value="MIGRASI">MIGRASI</option>
                            <option value="OSP">OSP</option>
                            <option value="EKSPEDISI">EKSPEDISI</option>
                            <option value="LEMBUR">LEMBUR</option>
                            <option value="ITMOA 15%">ITMOA 15%</option>
                            <option value="ITMOA 25%">ITMOA 25%</option>
                            <option value="ITMOA 85%">ITMOA 85%</option>
                            <option value="ITMOA 75%">ITMOA 75%</option>
                            <option value="AMS 15%">AMS 15%</option>
                            <option value="AMS 25%">AMS 25%</option>
                            <option value="AMS 85%">AMS 85%</option>
                            <option value="AMS 75%">AMS 75%</option>
                            <option value="PT2 SIMPLE">PT2 SIMPLE</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label for="teritory-input-arsip-masuk">Arsip Area</label>
                    <div class="form-group">
                        <select class="form-control" id="box-penyimpanan-arsip-input-arsip-masuk" name="teritory">
                            <option>Pilih Area</option>
                            <option value="SBU">SBU</option>
                            <option value="MDR">MDR</option>
                            <option value="SBS">SBS</option>
                            <option value="SDA">SDA</option>
                            <option value="PSN">PSN</option>
                            <option value="MLG">MLG</option>
                            <option value="KDI">KDI</option>
                            <option value="MAN">MAN</option>
                            <option value="JER">JER</option>
                            <option value="DPS">DPS</option>
                            <option value="SGR">SGR</option>
                            <option value="NTB">NTB</option>
                            <option value="NTT">NTT</option>
                            <option value="REG">REG</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="teritory-input-arsip-masuk">Box Penyimpanan Arsip</label>
                    <div class="form-group">
                        <select class="form-control" id="box-penyimpanan-arsip-input-arsip-masuk" name="box">
                            <option>Pilih Box</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
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
