<form action="">
    <div class="modal fade" id="input-arsip-confrim-keluar" tabindex="-1" role="dialog" aria-labelledby="input-arsip-confrim-keluar" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title modal-title-custom" id="input-arsip-keluar">Input Arsip Keluar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="title text-center mt-4">
                ID Arsip yang akan dikeluarkan: <span><b>134944</b></span>  
              </p>
              <div class="row d-flex justify-content-center mt-2">
                <div class="col-md-4">
                  <button type="button" class="button" data-toggle="modal" data-target="#input-arsip-confrim-sukses-keluarkan" data-dismiss="modal" aria-label="Close">Keluarkan</button>
                </div>
                <div class="col-md-4">
                  <button type="button" class="button" data-dismiss="modal" aria-label="Close">Batalkan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</form>

<!-- Modal Input Arsip Keluar (Confrim Keluarkan) -->
@include('admin.kelola-arsip.impress-fund.modal-arsip-keluar-sukses-keluarkan')
