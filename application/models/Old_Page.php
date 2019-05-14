<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Model {

	public $hasil;

	function __construct(){
		parent::__construct();
	}

	function get_page($id,$blog_id){
		if ($blog_id==1) {
			$path='';
		}
		else{
			$query2=$this->db->query("SELECT path FROM tbl_blogs WHERE blog_id='$blog_id'");
			foreach ($query2->result_array() as $value2) {
				$path=$value2['path'].'/';
			}
		}
		

		if($id>0){
		

		$query=$this->db->query("SELECT * FROM pages WHERE page_id='$id'");
		if($query->num_rows()>0){
			$row=$query->row();
			$this->hasil= array(
				"id"=>$row->page_id,
				"judul"=>$row->page_judul,
				"judul_eng"=>$row->page_judul_eng,
				"foto"=>$row->page_foto,
				"url"=>$row->page_url,
				"url_eng"=>$row->page_url_eng,
				"path"=>$path,
				"isi"=>reversequote($row->page_isi,"all"),
				"isi_eng"=>reversequote($row->page_isi,"all"),
				"javascript"=>reversequote($row->page_javascript,"all"),
				"status"=>$row->page_status,
				"keywords"=>$row->page_meta_keywords,
				"description"=>$row->page_meta_description,
				"date"=>$row->page_created
				);
			return true;
		} else {
			return false;
		}
	 } else {
	 	$this->hasil= array(
				"id"=>0,
				"judul"=>"",
				"judul_eng"=>"",
				"foto"=>"",
				"url"=>"",
				"url_eng"=>"",
				"path"=>$path,
				"isi"=>"",
				"isi_eng"=>"",
				"javascript"=>"",
				"status"=>"",
				"keywords"=>"",
				"description"=>"",
				"date"=>""
	 		);
	 		return true;
	 }
	}
}