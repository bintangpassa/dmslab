          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Atur sistem DMS
            </li>
            <li class="breadcrumb-item active">Tambah Matakuliah</li>
          </ol>
          <div class="card card-login mx-auto mt-8" style="margin-bottom: 17px;">
	        <div class="card-header">Silahkan Lengkapi Data</div>
	        <div class="card-body">
	            <form class='form-mk-baru' id='love'>
          				<div class='form-group'>
          					<label for='kodemk'>Kode Matakuliah</label>
          					<span class='label label-danger text-danger'></span>
                      		<div class='input-group input-group-addon has-feedback'>
                      			<span class="input-group-addon" id="kodemk"></span>
          						  <input type='text' class='form-control' id='kodemk' placeholder='kode matakuliah' data-toggle='tooltip' data-placement='top' title='Masukkan Kode Matakuliah. Harus unique' ><span class='form-control-feedback'></span>
                      		</div>
          				</div>

                    	<div class='form-group'>
	          				<label for='namamk'>Nama Matakuliah</label> <span class='label label-danger text-danger'></span>
                      		<div class='input-group has-feedback'>
                      			<span class="input-group-addon" id="namamk"></span>
	          					<input type='text' class='form-control' id='namamk' placeholder='nama matakuliah' data-toggle='tooltip' data-placement='top' title='Masukkan nama matakuliah'><span class='form-control-feedback'></span>
                      		</div>
          				</div>
          				<div class='form-group '>
          					<label for='sksmk'>Banyak SKS Matakuliah</label>
                        	<select class='form-control' name='sksmk' id='sksmk'>
                          		<option value='1'>1</option>
                          		<option value='2'>2</option>
                          		<option value='3' selected>3</option>
                          		<option value='4'>4</option>
                          		<option value='5'>5</option>
                          		<option value='6'>6</option>
                        	</select>
          				</div>    
          				<div class='form-group '>
          					<label for='semestermk'>Semester Matakuliah</label>
                        	<select class='form-control' name='semestermk' id='semestermk'>
                          		<option value='1' selected>Ganjil</option>
                          		<option value='2'>Genap</option>
                        	</select>
          				</div> 		 				    				
          				<div class="text-center"><button type='submit' class='btn btn-primary'>Simpan</button></div>
          		</form>
	        </div>
	      </div>