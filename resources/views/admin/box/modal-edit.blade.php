{{-- <form action=""> --}}
    <div class="modal fade" id="edit-box" tabindex="-1" role="dialog" aria-labelledby="add-box" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title modal-title-custom" id="input-arsip-keluar">Document Preview</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('box.update') }}" method="POST" id="tambah_file" enctype="multipart/form-data">@csrf
                <div class="row">
                    <input type="hidden" value="" id="box_id" name="box_id">
                  <div class="col-md-3">
                    <input type="text" class="form-control" id="box_name" name="nama" placeholder="Nama Box">
                  </div>
                  <div class="col-md-3">
                    <select name="subunit" id="type_box" class="form-control">
                     
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select name="type" id="type_archive" class="form-control">
                      <option value="">Pilih Subunit Arsip</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <input type="number" min="1" class="form-control" id="box_kuota" name="kuota" placeholder="Kuota Box">
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <button class="button" type="submit" style="width: 100%;">
                      <span class="mr-3">
                        <img src="{{asset ("template")}}/img/icon-plus.svg" alt="">
                      </span> 
                      Edit Box
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    {{-- </form> --}}
    
    
    