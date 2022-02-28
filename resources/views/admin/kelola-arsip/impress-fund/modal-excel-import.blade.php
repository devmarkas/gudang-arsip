<form action="{{ route('impress_fund.import') }}" method="POST" enctype="multipart/form-data">@csrf
    <div class="modal fade" id="excel-import" tabindex="-1" role="dialog" aria-labelledby="excel-import" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title modal-title-custom" id="input-arsip-keluar">Input Arsip Keluar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="excel-import">Input ID Arsip</label>
              <div class="row mb-2">
                <div class="col-md-8">
                  <div class="input-group">
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                      </div>
                    </div>                    
                  </div>
                </div>
                <div class="col-md-2">
                  
                  <button type="submit" class="button" style="width: 110%; margin-left: -12%;">
                    <span class="mr-2">
                      <img src="{{asset ("template")}}/img/icon-upload.svg" alt="">
                    </span>Upload</button>
                </div>
                <div class="col-md-2">
                  <button type="file" class="button" style="width: 132%; margin-left: -23%;">Scan Barcode</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</form>


