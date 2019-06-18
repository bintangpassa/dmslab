<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Daftar_ins extends CI_Model
{
	function __construct(){
		parent::__construct();
		
	}

	function get_ins($id_laboran){
		$query=$this->db->query("SELECT * FROM dok_instruksi WHERE id_laboran='$id_laboran' ORDER BY tgl_upload_instruksi DESC");
		$result="";
		$no=1;

		foreach ($query->result_array() as $daftarakun) {
			$status_ins="$daftarakun[status_instruksi]";
			$result.="<tr>";
			$result.="<td>$no</td>";
			$result.="<td>$daftarakun[nama_instruksi]</td>";			
			$result.="<td>$daftarakun[file_instruksi]</br></td>";
			$result.="<td>$daftarakun[jenis_instruksi]</br></td>";
			$result.="<td>$daftarakun[tgl_upload_instruksi]</td>";
			$result.="<td>";
			if ($status_ins=="1") {
				$result.="<span class='badge badge-success'>Approved</span></td>";
			}
			elseif($status_ins=="2"){
				$result.="<span class='badge badge-danger'>Rejected</span></td>";
			}
			else{
				$result.="<span class='badge badge-warning'>Pending</span></td>";
			}
			$result.="<td><div class='btn-group-sm'>
				<button class='btn btn-info' title='Ganti Password'>GP</button>
				<button class='btn btn-danger' title='Non-Aktifkan'>N-A</button>
				</div></td>";
			$result.="</tr>";
			$no++;
		}
		return $result;
	}

	function get_ins_ku(){
		$query=$this->db->query("SELECT * FROM dok_instruksi WHERE status_instruksi='0' ORDER BY tgl_upload_instruksi DESC");
		$result="";
		$nama_file="";
		$no=1;

		foreach ($query->result_array() as $daftarakun) {
			$query2=$this->db->query("SELECT id_user FROM laboran WHERE id_laboran='$daftarakun[id_laboran]'");
			foreach ($query2->result_array() as $laboran) {
				$query3=$this->db->query("SELECT nama_lengkap_user FROM user WHERE id_user='$laboran[id_user]'");
				foreach ($query3->result_array() as $user) {
			
				}
			}
			$nama_file="$daftarakun[file_instruksi]";
			$file=base_url()."index.php/dms/download/".$nama_file;
			$status_ins="$daftarakun[status_instruksi]";
			$result.="<tr>";
			$result.="<td>$no</td>";
			$result.="<td>$daftarakun[nama_instruksi]</td>";			
			$result.="<td>$daftarakun[file_instruksi]</br></td>";
			$result.="<td>$daftarakun[jenis_instruksi]</br></td>";
			$result.="<td>$user[nama_lengkap_user]</td>";
			$result.="<td>$daftarakun[tgl_upload_instruksi]</td>";
			$result.="<td><div class='btn-group-sm'>
				<a class='btn btn-primary' title='Unduh File' href='$file'>U</a>
				<button class='btn btn-success' title='Approve' value='$daftarakun[id_instruksi]' onclick='appIns()'>A</button>
				<button class='btn btn-warning' title='Perbaiki' value='$daftarakun[id_instruksi]' onclick='repIns()'>P</button>
				<button class='btn btn-danger' title='Reject' value='$daftarakun[id_instruksi]' onclick='rejIns()'>R</button></div></td>";
			$result.="</tr>";
			$no++;
		}
		return $result;
	}

	function get_ins_ku1(){
		$query=$this->db->query("SELECT * FROM dok_instruksi WHERE status_instruksi='1' ORDER BY tgl_upload_instruksi DESC");
		$result="";
		$nama_file="";
		$no=1;

		foreach ($query->result_array() as $daftarakun) {
			$query2=$this->db->query("SELECT id_user FROM laboran WHERE id_laboran='$daftarakun[id_laboran]'");
			foreach ($query2->result_array() as $laboran) {
				$query3=$this->db->query("SELECT nama_lengkap_user FROM user WHERE id_user='$laboran[id_user]'");
				foreach ($query3->result_array() as $user) {
			
				}
			}
			$nama_file="$daftarakun[file_instruksi]";
			$file=base_url()."index.php/dms/download/".$nama_file;
			$status_ins="$daftarakun[status_instruksi]";
			$result.="<tr>";
			$result.="<td>$no</td>";
			$result.="<td>$daftarakun[nama_instruksi]</td>";			
			$result.="<td>$daftarakun[file_instruksi]</br></td>";
			$result.="<td>$daftarakun[jenis_instruksi]</br></td>";
			$result.="<td>$user[nama_lengkap_user]</td>";
			$result.="<td>$daftarakun[tgl_upload_instruksi]</td>";
			$result.="<td><div class='btn-group-sm'>
				<a class='btn btn-primary' title='Unduh File' href='$file'>U</a></td>";
			$result.="</tr>";
			$no++;
		}
		return $result;
	}
} 