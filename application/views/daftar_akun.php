          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Akun
            </li>
            <li class="breadcrumb-item active">Data Semua Akun</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Tabel data semua akun DMS</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Akun</th>
                      <th>Nama Lengkap</th>
                      <th>Level</th>
                      <th>Email</th>
                      <th>Terdaftar</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Akun</th>
                      <th>Nama Lengkap</th>
                      <th>Level</th>
                      <th>Email</th>
                      <th>Terdaftar</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php echo $daftar_akun;?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"><a class="btn btn-primary" href="<?php echo base_url();?>index.php/dms/buat_akun" togle="">Buat Akun Baru</a></div>
            
          </div>