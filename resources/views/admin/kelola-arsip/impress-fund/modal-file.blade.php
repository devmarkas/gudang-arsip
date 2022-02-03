<form action="">
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
                <table class="table table-sm table-hover tabel-arsip">
                    <thead>
                      <tr>
                        <th scope="col">Tanggal Diupload</th>
                        <th scope="col">Nama Document</th>
                        <th scope="col">Preview</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>12 Januari 2022 08:00 WIB</td>
                        <td>Document 1</td>
                        <td>
                          <img src="{{asset ("template")}}/img/icon-preview.svg" alt="">
                        </td>
                      </tr>
                      <tr>
                        <td>12 Januari 2022 09:00 WIB</td>
                        <td>Document 2</td>
                        <td>
                          <img src="{{asset ("template")}}/img/icon-preview.svg" alt="">
                        </td>
                      </tr>
                      <tr>
                        <td>12 Januari 2022 10:00 WIB</td>
                        <td>Document 3</td>
                        <td>
                          <img src="{{asset ("template")}}/img/icon-preview.svg" alt="">
                        </td>
                      </tr>
                    </tbody>
                </table>
              </div>
              <button type="button" class="button" data-toggle="modal" data-target="#sukses-hapus" data-dismiss="modal" aria-label="Close">
                <span class="mr-3">
                  <img src="{{asset ("template")}}/img/icon-plus.svg" alt="">
                </span> 
                Tambahkan File
              </button>
            </div>
          </div>
        </div>
    </div>
</form>


