<!DOCTYPE html>
<html lang"en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>DMS Fakultas Ilmu Terapan</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/custom.css">

	<script src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<img class="mb-4 img-fluid" src="<?php echo base_url(); ?>images/logosas.png" alt="">
				</div>				
			</div>
		</div>
	</div>
	<div class="row">
			<form action="<?php echo base_url() ?>index.php/dms/proseslogin" method="POST" class="form-signin text-center">
			    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
			    <label for="inputUsername" class="sr-only">Username</label>
			    <input type="text" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
			    <label for="inputPassword" class="sr-only">Password</label>
			    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

			    <div class="checkbox mb-3">
			        <label>
			        	<input type="checkbox" value="remember-me"> Remember me
			        </label>
			    </div>

			    <button class="btn btn-lg btn-block" type="submit" style="background-color:#008641; color:#fff;">Login</button>
			    <?php 
					if($status==1){
				?>
					<div class="alert alert-danger" role="alert">
					<span class='glyphicon glyphicon-alert'></span> Username atau password salah!
					</div>
				<?php 
					}
				?>
			    <p class="mt-5 mb-3 text-muted">Copyright © Okananda Rizky Perdana</p>
		    </form>
		</div>
  </body>