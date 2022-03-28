{{-- <form action=""> --}}
<div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="file" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title modal-title-custom" id="input-arsip-keluar">Document Preview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-sm table-hover tabel-arsip" id="tabel-arsip">
                <thead>
                  <tr>
                    <th scope="col">Tanggal Diupload</th>
                    <th scope="col">Nama Document</th>
                    <th scope="col">Preview</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>            
          </div>
          
          <button type="button" class="button" data-toggle="modal" id="btn_tambah_file"  aria-label="Close">
            <span class="mr-3">
              <img src="{{asset ("template")}}/img/icon-plus.svg" alt="">
            </span> 
            Tambahkan File
          </button>
          <form action="{{ route('archive_save.save') }}" method="POST" id="tambah_file" enctype="multipart/form-data">@csrf
            <div class="row">
                <input type="hidden" name="archive_id" id="archive_id">
              <div class="col-md-10">
                <input type="file" class="form-control" name="file" id="file" placeholder="Pilih Dokumen">
              </div>
              <div class="col-md-2">
                <button class="button" type="submit">
                  <span class="mr-3">
                    <img src="{{asset ("template")}}/img/icon-plus.svg" alt="">
                  </span> 
                  Upload</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
{{-- </form> --}}


