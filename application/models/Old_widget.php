<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Widget extends CI_Model
{
	function __construct(){
		parent::__construct();
		
	}


	function get_widget_pil(){
		$query=$this->db->query("SELECT * FROM widget ORDER BY widget ASC");
		$pil="";
		foreach ($query->result_array() as $widget) {
			$pil.="<option value='$widget[id_widget]''>$widget[widget]</option>";
		}

		return $pil;
	}

	function get_widget_menu($blog_id){
		$query=$this->db->query("SELECT * FROM widget_menu WHERE blog_id='$blog_id' ORDER BY urutan ASC");
		$no=1;
		$result="";
		foreach ($query->result_array() as $menuheader) {

			$result.="<tr data-id='$menuheader[id_widget_menu]'>";
			$result.="<th class='nomor'>$no</th>";
			$result.="<td>
						<span class='link-text editable-span' data-id='$menuheader[id_widget_menu]'>$menuheader[nama_widget_in]</span>
						<input type='text' class='form-control form-link sembunyi' data-id='$menuheader[nama_widget_in]' value='$menuheader[nama_widget_in]' />
						</td>";
			$result.="<td>
						<span class='link-text editable-span' data-id='$menuheader[id_widget_menu]'>$menuheader[nama_widget_en]</span>
						<input type='text' class='form-control form-link sembunyi' data-id='$menuheader[nama_widget_en]' value='$menuheader[nama_widget_en]' />
						</td>";
			$result.="<td>
						<span class='link-text editable-span' data-id='$menuheader[id_widget_menu]'>$menuheader[urutan]</span>
						<input type='text' class='form-control form-link sembunyi' data-id='$menuheader[urutan]' value='$menuheader[urutan]' />
						</td>";			
			$result.="<td><i class='fa hapus-news fa-close hapus-icon' data-id='$menuheader[id_widget_menu]'></i></td>";


			$result.="</tr>";

			$no++;
		}

		return $result;
	}
	

	
} 