<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_instruksi extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function new_instruksi(){
		$namains=($this->input->post('namains'));
		$jenisins=($this->input->post('jenisins'));
		$id_laboran=($this->input->post('id_laboran'));
		$tupins=date("Y-m-d h:i:s",time());

		// input tabel user
		$cekkodemk=$this->db->get_where('matakuliah',array('kode_mk'=>$kodemk,'terhapus_mk'=>'0'));
		if($cekkodemk->num_rows()>0){
			echo "taken";
		}else{
			$query=$this->db->insert('matakuliah',array('nama_instruksi'=>$namains,
									 'jenis_instruksi'=>$jenisins,
									 'id_laboran'=>$id_laboran,
									 'tgl_upload_instruksi'=>$tupins,
									 'status_instruksi'=>'0',
									 'terhapus_instruksi'=>'0',			
									));

			if($query){
				echo "ok";
			}
		}
	}
}
