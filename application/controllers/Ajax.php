<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	protected $login=false;
 
	protected $id_user;
	protected $nama_user;
	protected $password_user;
	protected $level_user;

	function __construct(){
		parent::__construct();
	}

	function cek_new_username(){
		$username=trim(($this->input->post('username')));
		//$query=$this->db->query("SELECT * FROM user WHERE name_user='$username' AND terhapus='N' ");
		$query=$this->db->get_where('user',array('nama_user'=>$username,'terhapus_user'=>'0'));
		if($query->num_rows()<1){
			echo "ok";
		} else{
			echo "terpakai";	
		} 
	}

	function new_akun(){
		$username=trim(($this->input->post("username")));
		$email=($this->input->post("email"));
		$nama=($this->input->post("nama"));
		$password=sha1(md5($this->input->post("password")));
		$nipnim=($this->input->post("nipnim"));
		$level=($this->input->post("leveluser"));
		$terdaftar=date("Y-m-d h:i:s",time());

		// $level=($admin_level=="super")?"1":"0";
		
		// input tabel user
		$user=$this->db->get_where('user',array('nama_user'=>$username,'terhapus_user'=>'0'));
		if($user->num_rows()>0){
			echo "taken";
		}else{
			$query=$this->db->insert('user',array('nama_user'=>$username,
									 'nama_lengkap_user'=>$nama,
									 'email_user'=>$email,
									 'password_user'=>$password,
									 'nipnim_user'=>$nipnim,
									 'terhapus_user'=>'0',
									 'status_user'=>'1',
									 'level_user'=>$level,
									 'tgl_terdaftar_user'=>$terdaftar
									));

			// input tabel aslab
			if ($level==4) {
				$query=$this->db->query("SELECT id_user FROM user WHERE nama_user='$username' AND tgl_terdaftar_user='$terdaftar'");
				foreach ($query->result_array() as $user) {
					$id_user="$user[id_user]";
				}
				if ($query) {
					$query1=$this->db->insert('aslab',array('id_user'=>$id_user,
										 'bagian_aslab'=>'1',
										 'status_aslab'=>'1',
										 'terhapus_aslab'=>'0',
										));
				}
			}

			if ($level==3) {
				$query=$this->db->query("SELECT id_user FROM user WHERE nama_user='$username' AND tgl_terdaftar_user='$terdaftar'");
				foreach ($query->result_array() as $user) {
					$id_user="$user[id_user]";
				}
				if ($query) {
					$query1=$this->db->insert('dosen',array('id_user'=>$id_user,
										 'id_mk'=>'1',
										 'status_dosen'=>'1',
										 'terhapus_aslab'=>'0',
										));
				}
			}

			if($query){
				echo "ok";
			}
		}

		
	}
}
