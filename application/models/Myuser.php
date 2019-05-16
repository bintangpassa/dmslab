<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Myuser extends CI_Model {

 public $id;
 public $nama;
 public $password;
 public $level;
 public $nama_lengkap;
 public $id_laboran;

 function __construct (){
 	parent::__construct();
	$this->load->library('session');
 } 

 function set($id,$nama,$password){


 	$query=$this->db->query("SELECT * from user where id_user='$id'and nama_user='$nama' and password_user='$password' and status_user='1' and terhapus_user='0'");
 	if($query->num_rows()>0){
 	$row=$query->row();
 	$this->id=$row->id_user;
 	$this->nama=$row->nama_user;
 	$this->password=$row->password_user;
 	$this->level=$row->level_user;
 	$this->nama_lengkap=$row->nama_lengkap_user;
 	$this->id_laboran="";
 				if ($this->level == 5) {
			 		$cari2=$this->db->get_where("laboran",array("id_user"=>$row->id_user,"status_laboran"=>"1","terhapus_laboran"=>"0"));
			 		if($cari2->num_rows()<1){
	 					$this->id_laboran="";
	 				}
	 				else{
	 					$row2=$cari2->row();
	 					$this->id_laboran=$row2->id_laboran;
	 				}
			 	}	
 	$data_sessi=array('login'=>true,
	 				  'id_user'=>$this->id,
	 				  'id_laboran'=>$this->id_laboran,
	 				  'nama_user'=>$this->nama,
	 				  'password_user'=>$this->password,
	 				  'level_user'=>$this->level);
	 $this->session->set_userdata($data_sessi);


	 // mulai generate access security key
	 if(!$this->session->userdata("random_filemanager_key")){
	 	$karakter = 'abcdefghijklmnopqrstuvwxyz0123456789';
	 	$hasil = '';
		 for ($i = 0; $i < 10; $i++) {
		      $hasil .= $karakter[rand(0, strlen($karakter) - 1)];
		 }
		 $this->session->set_userdata(array("random_filemanager_key"=>$hasil));
	 };
	 
 	 return true;
 	}
 	else {
 		$data_sessi=array('login'=>false,
	 						'id_user'=>"",
	 						'id_laboran'=>"",
	 						'nama_user'=>"",
	 						'password_user'=>"");
	 	$this->session->set_userdata($data_sessi);
 		return false;
 	}
 }
}
?>