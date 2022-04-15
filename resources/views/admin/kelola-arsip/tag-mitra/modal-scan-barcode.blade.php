<form action="">
  <div class="modal fade" id="input-scan-barcode" tabindex="-1" role="dialog" aria-labelledby="input-scan-barcode" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title modal-title-custom" id="input-arsip-keluar">Scan Arsip</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="tahun-input-arsip-keluar">Input ID Arsip</label>
            <div class="row mb-2">
              <div class="col-md-8">
                <div class="input-group">
                  <input type="text" class="form-control mt-1" placeholder="input id arsip" id="scan_archive" onkeyup="scan_tm_barcode()" autofocus>
                </div>
              </div>
              <div class="col-md-2">
                <button type="button" class="button" style="width: 110%; margin-left: -12%;">Cari Arsip</button>
              </div>
              <div class="col-md-2">
                <button type="button" class="button" style="width: 132%; margin-left: -23%;">Scan Barcode</button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-sm table-hover tabel-arsip" id="tabel_scan_archive_partner_out">
                  <thead>
                    <tr>
                      <th scope="col">ID PM</th>
                      <th scope="col">PEKERJAAN</th>
                      <th scope="col">BULAN</th>
                      <th scope="col">AREA</th>
                      <th scope="col">BOX</th>
                      <th class="action" scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  </tbody>
              </table>
          </div>
          </div>
        </div>
      </div>
  </div>
</form>

<!-- Modal Input Arsip Keluar (Confrim Keluarkan) -->
@include('admin.kelola-arsip.tag-mitra.modal-arsip-keluar-confrim-keluarkan')
