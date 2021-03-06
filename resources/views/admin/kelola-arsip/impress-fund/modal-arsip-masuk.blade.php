<form action="{{ route('impress_fund.save') }}" method="POST">@csrf
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
                        <select class="form-control" id="tahun-input-arsip-masuk" name="tahun">
                            <option value="">Tahun</option>
                            @for ($i = 2015; $i < date('Y'); $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="bulan-input-arsip-masuk">Bulan</label>
                        <select class="form-control" id="bulan-input-arsip-masuk" name="bulan">
                            <option value="">Bulan</option>
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
                    <label for="teritory-input-arsip-masuk">Arsip Teritory</label>
                    <div class="form-group">
                        <select class="form-control" id="teritory-input-arsip-masuk" name="teritory">
                          <option value="">Pilih Teritory</option>
                          <option value='BALI'>BALI</option>
                          <option value='BALNUS'>BALNUS</option>
                          <option value='JATIM'>JATIM</option>
                          <option value='JATIM1'>JATIM1</option>
                          <option value='JATIM2'>JATIM2</option>
                          <option value='JATIM3'>JATIM3</option>
                          <option value='NUSRA'>NUSRA</option>
                          <option value='REGIONAL'>REGIONAL</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-5">
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
