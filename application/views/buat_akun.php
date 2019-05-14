          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Akun
            </li>
            <li class="breadcrumb-item active">Buat Akun Baru</li>
          </ol>
          <div class="card card-login mx-auto mt-8" style="margin-bottom: 17px;">
	        <div class="card-header">Silahkan Lengkapi Data</div>
	        <div class="card-body">
	            <form class='form-user-baru' id='love'>
          				<div class='form-group'>
          					<label for='username'>Username</label>
          					<span class='label label-danger text-danger'></span>
                      		<div class='input-group input-group-addon has-feedback'>
                      			<span class="input-group-addon" id="username"></span>
          						  <input type='text' class='form-control' id='username' placeholder='username' data-toggle='tooltip' data-placement='top' title='Masukkan Username. Harus unique' ><span class='form-control-feedback'></span>
                      		</div>
          				</div>
          				<div class='form-group'>
          					<label for='password'>Password</label> <span class='label label-danger text-danger'></span>
                      		<div class='input-group has-feedback'>
                      			<span class="input-group-addon" id="password"></span>
          						<input type='password' class='form-control' id='password' placeholder='password' data-toggle='tooltip' data-placement='top' title='Minimal 8 karakter' ><span class='form-control-feedback'></span>
                      		</div>
          				</div>
          				<div class='form-group'>
          					<label for='repassword'>Konfirmasi Password</label> <span class='label label-danger text-danger'></span>
                      		<div class='input-group has-feedback'><span class="input-group-addon" id="repassword"></span>
          						<input type='password' class='form-control' id='repassword' placeholder='masukan kembali password' data-toggle='tooltip' data-placement='top' title='Password harus sama'  ><span class='form-control-feedback'></span>
          					</div>
          				</div>

                    	<div class='form-group'>
	          				<label for='nama_lengkap'>Nama Lengkap</label> <span class='label label-danger text-danger'></span>
                      		<div class='input-group has-feedback'>
                      			<span class="input-group-addon" id="nama_lengkap"></span>
	          					<input type='text' class='form-control' id='nama_lengkap' placeholder='nama lengkap' data-toggle='tooltip' data-placement='top' title='masukkan nama lengkap' ><span class='form-control-feedback'></span>
                      		</div>
          				</div>
          				<div class='form-group'>
          					<label for='email'>Email</label>
          					<span class='label label-danger text-danger'></span>
                      		<div class='input-group has-feedback'>
                      			<span class="input-group-addon" id="email"></span>
          					 	   <input type='text' class='form-control' id='email' placeholder='email' data-toggle='tooltip' data-placement='top' title='Masukkan Email' ><span class='form-control-feedback'></span>
                     		</div>
          				</div>
          				<div class='form-group'>
          					<label for='nipmim'>NIP/NIM</label>
          					<span class='label label-danger text-danger'></span>
                      		<div class='input-group input-group-addon has-feedback'>
                      			<span class="input-group-addon" id="nipnim"></span>
          						  <input type='text' class='form-control' id='nipnim' placeholder='Masukan salah satu NIP atau NIM' data-toggle='tooltip' data-placement='top' title='Masukkan NIP atau NIM. Harus unique' ><span class='form-control-feedback'></span>
                      		</div>
          				</div>
		 			      	<div class='form-group '>
          					<label for='leveluser'>Level user</label>
                      <select class='form-control' name='leveluser' id='leveluser'>
                        <option value='1' selected>Super User</option>
                        <option value='2'>Kepala Laboraturium</option>
                        <option value='3'>Dosen</option>
                        <option value='4'>Aslab</option>
                        <option value='5'>Staff</option>
                      </select>
          				</div> 
                  <div class='form-group' id="bagian">
                    <label for='bagian'>Bagian</label>
                      <select class='form-control' name='bagian' id='bagianselect'>
                        
                      </select>
                  </div>        				
          				<div class="text-center"><button type='submit' class='btn btn-primary'>Simpan</button></div>
          		</form>
	        </div>
	      </div>