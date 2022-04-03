{{-- <form action=""> --}}
<div class="modal fade" id="add-box" tabindex="-1" role="dialog" aria-labelledby="add-box" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title modal-title-custom" id="input-arsip-keluar">Tambah BOX</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('box.store') }}" method="POST" id="tambah_file" enctype="multipart/form-data">@csrf
            <div class="row">
              <div class="col-md-3">
                <input type="text" class="form-control" name="nama" placeholder="Nama Box">
              </div>
              <div class="col-md-3">
                <select name="subunit" id="type" class="form-control">
                  <option value="">Pilih Unit Arsip</option>
                  <option value="Finance & Billco">Finance & Billco</option>
                  <option value="Commerce">Commerce</option>
                  <option value="Construction">Construction</option>
                  <option value="HCM">HCM</option>
                </select>
              </div>
              <div class="col-md-3">
                <select name="type" id="type" class="form-control">
                  <option value="">Pilih Subunit Arsip</option>
                  <option value="IF">Imprest Fund</option>
                  <option value="TM">Tagihan Mitra</option>
                </select>
              </div>
              <div class="col-md-3">
                <input type="number" min="1" class="form-control" name="kuota" placeholder="Kuota Box">
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12">
                <button class="button" type="submit" style="width: 100%;">
                  <span class="mr-3">
                    <img src="{{asset ("template")}}/img/icon-plus.svg" alt="">
                  </span> 
                  Tambah Box
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
{{-- </form> --}}


