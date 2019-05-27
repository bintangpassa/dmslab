<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_instruksi extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function dokumen_new(){
		$config=array(
			"upload_path"=>FCPATH."dokumen_terupload/",
			"allowed_types"=>"doc|docx|pdf"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());
                       echo $error['error'];
                       echo "<br>";
                       echo FCPATH."dokumen_terupload/";
                }
                else
                {
                	$nama=$this->upload->data('file_name');
                	$sesi_form=($this->input->post('sesi'));
                	$token_file=($this->input->post('token_file'));
                	$query=$this->db->insert('file_tmp',array('nama_file'=>$nama,'token_file'=>$token_file,'sesi_form'=>$sesi_form));
                	echo 'ok';
                }
	}

	function delete_dokumen_temp(){
		$token_file=($this->input->post('file_token'));
		$query=$this->db->get_where('file_tmp',array('token_file'=>$token_file));
		if($query->num_rows()>0){
			$row=$query->row();
			$query2=$this->db->where(array('token_file'=>$token_file))->delete('file_tmp');
			if($query){
				unlink(FCPATH."dokumen_terupload/".$row->nama_file);
			}
		}
	}

	function new_instruksi(){
		$namains=($this->input->post('namains'));
		$jenisins=($this->input->post('jenisins'));
		$id_laboran=($this->input->post('id_laboran'));
		$tupins=date("Y-m-d H:i:s",time());
		$sessi=($this->input->post('sessi'));
		$file_name="";

		$sfile=$this->db->get_where('file_tmp',array('sesi_form'=>$sessi));
			
			
		if($sfile->num_rows()>0){
			foreach($sfile->result_array() as $row){
				$row2=$sfile->row();
				$file_name=$row2->nama_file;
				$sfile=$this->db->delete('file_tmp',array('sesi_form'=>$sessi));
			}
			$query=$this->db->insert('dok_instruksi',array('nama_instruksi'=>$namains,
									 'jenis_instruksi'=>$jenisins,
									 'id_laboran'=>$id_laboran,
									 'tgl_upload_instruksi'=>$tupins,
									 'status_instruksi'=>'0',
									 'terhapus_instruksi'=>'0',
									 'file_instruksi'=>$file_name,		
									));

			if($query){
				echo "ok";
			}
		}
	}
}
