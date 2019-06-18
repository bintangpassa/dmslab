          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Instruksi Kerja
            </li>
            <li class="breadcrumb-item active">Daftar ter-Acc</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Tabel data semua instruksi kerja yang sudah di acc</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Instruksi</th>
                      <th>Nama Dokumen</th>
                      <th>Jenis</th>
                      <th>Nama Pengunggah</th>
                      <th>Tanggal Unggah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Instruksi</th>
                      <th>Nama Dokumen</th>
                      <th>Jenis</th>
                      <th>Nama Pengunggah</th>
                      <th>Tanggal Unggah</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php echo $daftar_ins?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>