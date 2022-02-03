<form action="">
    <div class="modal fade" id="input-arsip-keluar" tabindex="-1" role="dialog" aria-labelledby="input-arsip-keluar" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title modal-title-custom" id="input-arsip-keluar">Input Arsip Keluar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="tahun-input-arsip-keluar">Input ID Arsip</label>
              <div class="row mb-2">
                <div class="col-md-8">
                  <div class="input-group">
                    <input type="text" class="form-control mt-1" placeholder="input id arsip">
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
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px" data-toggle="modal" data-target="#input-arsip-confrim-keluar" data-dismiss="modal" aria-label="Close">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" data-dismiss="modal" aria-label="Close" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                      <tr>
                        <td>134947</td>
                        <td>SEP</td>
                        <td>JATIM3</td>
                        <td>BOX A</td>
                        <td>
                          <button type="button" class="button" style="height: 29px">Arsip Keluar</button>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
    </div>
</form>

<!-- Modal Input Arsip Keluar (Confrim Keluarkan) -->
@include('admin.kelola-arsip.impress-fund.modal-arsip-keluar-confrim-keluarkan')
