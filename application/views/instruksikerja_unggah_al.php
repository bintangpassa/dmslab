          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Instruksi Kerja
            </li>
            <li class="breadcrumb-item active">Unggah baru</li>
          </ol>
          <div class="card card-login mx-auto mt-4" style="margin-bottom: 17px;">
	        <div class="card-header">Unggah Instruksi Kerja</div>
	        <div class="card-body">
	          <form class='form-instruksi-baru' id='love'>
	          	<input type='hidden' class='sesi-form' value='<?php echo rand(0,100).rand(10,500).date('dym') ?>' >
                    <div class='form-group'>
	          			<label for='namains'>Nama Instruksi</label> 
	          			<span class='label label-danger text-danger'></span>
                      	<div class='input-group has-feedback'>
                      		<span class="input-group-addon" id="namains"></span>
	          				<input type='text' class='form-control' id='namains' placeholder='Nama Instruksi' data-toggle='tooltip' data-placement='top' title='Masukkan Instruksi'><span class='form-control-feedback'></span>
                      	</div>
          			</div>

          			<div class='form-group '>
          				<label for='jenisins'>Jenis Instruksi</label>
                        <select class='form-control' name='jenisins' id='jenisins'>
                          	<option value="Umum"selected>Umum</option>
				    		<option value="Perawatan">Perawatan</option>
				    		<option value="Manajerial">Manajerial</option>
				    		<option value="Perkuliahan">Perkuliahan</option>
                        </select>
          			</div>    
	           
				<div class='form-group'>
                    <label>Dokumen</label>
          			<div class='dropzone dokumen_user well'></div>
          		</div>
          		
	            <div class="text-center"><button type='submit' class='btn btn-primary btn-block'>Unggah</button></div>
	          </form>
	        </div>
	      </div>