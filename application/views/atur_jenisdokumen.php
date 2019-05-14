          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Atur sistem DMS
            </li>
            <li class="breadcrumb-item active">Atur Jenis Dokumen</li>
          </ol>
          <div class="card card-login mx-auto mt-8" style="margin-bottom: 17px;">
	        <div class="card-header">Tambah Jenis Dokumen</div>
	        <div class="card-body">
	            <form class='form-user-baru' id='love'>
          				<div class='form-group'>
          					<label for='kode_mk'>Kode Matakuliah</label>
          					<span class='label label-danger text-danger'></span>
                      		<div class='input-group input-group-addon has-feedback'>
                      			<span class="input-group-addon" id="kode_mk"></span>
          						  <input type='text' class='form-control' id='kode_mk' placeholder='kode matakuliah' data-toggle='tooltip' data-placement='top' title='Masukkan Kode Matakuliah. Harus unique' ><span class='form-control-feedback'></span>
                      		</div>
          				</div>

                    	<div class='form-group'>
	          				<label for='nama_mk'>Nama Matakuliah</label> <span class='label label-danger text-danger'></span>
                      		<div class='input-group has-feedback'>
                      			<span class="input-group-addon" id="nama_mk"></span>
	          					<input type='text' class='form-control' id='nama_mk' placeholder='nama matakuliah' data-toggle='tooltip' data-placement='top' title='Masukkan nama matakuliah'><span class='form-control-feedback'></span>
                      		</div>
          				</div>
          				<div class='form-group '>
          					<label for='sks_mk'>Banyak SKS Matakuliah</label>
                        	<select class='form-control' name='sks_mk' id='sks_mk'>
                          		<option value='1' selected>1</option>
                          		<option value='2'>2</option>
                          		<option value='3'>3</option>
                          		<option value='4r'>4</option>
                          		<option value='5'>5</option>
                          		<option value='6'>6</option>
                        	</select>
          				</div>    
          				<div class='form-group '>
          					<label for='sks_mk'>Semester Matakuliah</label>
                        	<select class='form-control' name='sks_mk' id='sks_mk'>
                          		<option value='1' selected>Ganjil</option>
                          		<option value='2'>Genap</option>
                        	</select>
          				</div> 		 				    				
          				<div class="text-center"><button type='submit' class='btn btn-primary'>Simpan</button></div>
          		</form>
	        </div>
	      </div>