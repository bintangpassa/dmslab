<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_aturmk extends CI_Controller {
	protected $login=false;
 
	protected $id_user;
	protected $nama_user;
	protected $password_user;
	protected $level_user;

	function __construct(){
		parent::__construct();
	}

	function cek_new_kodemk(){
		$kodemk=($this->input->post('kodemk'));
		$query=$this->db->get_where('matakuliah',array('kode_mk'=>$kodemk,'terhapus_mk'=>'0'));
		if($query->num_rows()<1){
			echo "ok";
		} else{
			echo "terpakai";	
		} 
	}

	function new_mk(){
		$kodemk=($this->input->post('kodemk'));
		$namamk=($this->input->post('namamk'));
		$sksmk=($this->input->post('sksmk'));
		$semestermk=($this->input->post('semestermk'));

		// input tabel user
		$cekkodemk=$this->db->get_where('matakuliah',array('kode_mk'=>$kodemk,'terhapus_mk'=>'0'));
		if($cekkodemk->num_rows()>0){
			echo "taken";
		}else{
			$query=$this->db->insert('matakuliah',array('kode_mk'=>$kodemk,
									 'nama_mk'=>$namamk,
									 'sks_mk'=>$sksmk,
									 'semester_mk'=>$semestermk,
									 'status_mk'=>'1',
									 'terhapus_mk'=>'0',			
									));

			if($query){
				echo "ok";
			}
		}
	}
}
