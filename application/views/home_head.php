<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if ($user_level=="0") {
  $levela="Super Admin";
}

elseif ($user_level=="1") {
  $levela="' Super User '";
}
elseif ($user_level=="3") {
  $levela="Dosen";
}
elseif ($user_level=="2"){
  $levela="'Kepala Laboraturium'";
}
elseif ($user_level=="5"){
  $levela="Laboran";
}
elseif ($user_level=="4"){
  $levela="Admin Sistem";
}
else{
  $levela="Super Admin";
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DMS Fakultas Ilmu Terapan</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/sb-admin.css">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>css/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">DMS Fakultas Ilmu Terapan</a>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Notifikasi Baru</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Notifikasi Lama</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Pesan baru</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Pesan Lama</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas "><?php echo $user; ?></i>
            <i class=""><?php echo $levela; ?></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Pengaturan</a>
            <a class="dropdown-item" href="#">Log Aktifitas</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Akun</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <?php if ($user_level==0 || $user_level==1): ?>
              <h6 class="dropdown-header">Akun lain :</h6>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/buat_akun">Buatkan akun baru</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/daftar_akun">Data semua akun</a>
                <div class="dropdown-divider"></div>
            <?php endif ?>
            
            
            <h6 class="dropdown-header">Akun saya :</h6>
            <a class="dropdown-item" href="forgot-password.html">Atur akun saya</a>
          </div>
        </li>
        <?php if ($user_level==0 || $user_level==2 || $user_level==1): ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Instruksi Kerja</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <?php if ($user_level==0 || $user_level==1): ?>
              <h6 class="dropdown-header">Admin Lab :</h6>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/instruksi_kerja_unggah_al">Unggah baru</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/instruksi_kerja_al">Daftar instruksi</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/instruksi_kerja_histori_al">Riwayat</a>
            <?php endif ?>
            
            <?php if ($user_level==0 || $user_level==2): ?>
              <h6 class="dropdown-header">Ka Ur. Lab :</h6>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/instruksi_kerja_evaluasi_ku">Evaluasi</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/instruksi_kerja_ku">Daftar ter-Acc</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/instruksi_kerja_histori_ku">Riwayat</a>
            <?php endif ?>
          </div>
        </li>
        <?php endif ?>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Modul Praktikum</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <?php if ($user_level==0 || $user_level==1): ?>
              <h6 class="dropdown-header">Admin Lab :</h6>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/ugh_tmod_al">Unggah template baru</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/mod_al">Daftar template</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/mod_tertunda">Modul tertunda</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/ugh_tmod_al">Daftar modul</a>
            <?php endif ?>
            
            <?php if ($user_level==0 || $user_level==3): ?>
              <h6 class="dropdown-header">Dosen :</h6>
              <a class="dropdown-item" href="forgot-password.html">Unduh template</a>
              <a class="dropdown-item" href="forgot-password.html">Unggah modul baru</a>
              <a class="dropdown-item" href="forgot-password.html">Modul ter-unggah</a>
            <?php endif ?>
              

          </div>
        </li>
        <?php if ($user_level==0 || $user_level==4): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan Aslab</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <?php if ($user_level==0 || $user_level==4): ?>
              <h6 class="dropdown-header">Asisten Lab :</h6>
              <a class="dropdown-item" href="register.html">Template tersedia</a>
              <a class="dropdown-item" href="forgot-password.html">Request template</a>
              <a class="dropdown-item" href="forgot-password.html">Unggah laporan</a>
              <a class="dropdown-item" href="forgot-password.html">Daftar laporan</a>
              <a class="dropdown-item" href="forgot-password.html">Riwayat</a>
              
            <?php endif ?>
            

            <?php if ($user_level==0 || $user_level==1): ?>
              <h6 class="dropdown-header">Admin Lab :</h6>
              <a class="dropdown-item" href="forgot-password.html">Unggah template baru</a>
              <a class="dropdown-item" href="forgot-password.html">Daftar template</a>
              <a class="dropdown-item" href="forgot-password.html">Daftar laporan</a>
              <a class="dropdown-item" href="forgot-password.html">Riwayat</a>
            <?php endif ?>
            
            <?php if ($user_level==0 || $user_level==2): ?>
              <h6 class="dropdown-header">Ka Ur. Lab :</h6>
              <a class="dropdown-item" href="forgot-password.html">Evaluasi laporan</a>
              <a class="dropdown-item" href="forgot-password.html">Daftar ter-evaluasi</a>
              <a class="dropdown-item" href="forgot-password.html">Riwayat</a>
            <?php endif ?>
              

          </div>
        </li>
        <?php endif ?>
        
        <?php if ($user_level==0 || $user_level==1 || $user_level==2 ): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Atur Sistem DMS</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/input_matakuliah">Atur Matakuliah</a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/dms/atur_jenisdokumen">Atur Jenis Dokumen</a>
            <a class="dropdown-item" href="register.html">Akun Google Drive</a>
            <a class="dropdown-item" href="forgot-password.html">Aturan level user</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Monitoring</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="register.html">Akun Google Drive</a>
            <a class="dropdown-item" href="forgot-password.html">Aturan level user</a>
          </div>
        </li>
      <?php endif ?>

      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">