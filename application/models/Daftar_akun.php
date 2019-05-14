<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Daftar_akun extends CI_Model
{
	function __construct(){
		parent::__construct();
		
	}

	function get_akun(){
		$query=$this->db->query("SELECT * FROM user WHERE terhapus_user='0' ORDER BY id_user DESC");
		$query2=$this->db->query("SELECT * FROM level_user ORDER BY level_user ASC");
		$result="";
		$no=1;
		$status_user="";
		$level_user[]="";
		foreach ($query2->result_array() as $leveluser) {
			$nolevel="$leveluser[level_user]";
			$level_user[$nolevel]="$leveluser[nama_level]";
		}

		foreach ($query->result_array() as $daftarakun) {
			$status_user="$daftarakun[status_user]";
			$result.="<tr>";
			$result.="<td>$no</td>";
			$result.="<td>$daftarakun[nama_user]</br> ";
			if ($status_user=="1") {
				$result.="<span class='badge badge-success'>Aktif</span></td>";
			}
			else{
				$result.="<span class='badge badge-danger'>Non-Aktif</span></td>";
			}
			$result.="<td>$daftarakun[nama_lengkap_user]</br><span class='text-muted'>($daftarakun[nipnim_user])</span></td>";
			$nolevel="$daftarakun[level_user]";
			$result.="<td>$level_user[$nolevel]</td>";
			$result.="<td>$daftarakun[email_user]</td>";
			$result.="<td>$daftarakun[tgl_terdaftar_user]</td>";
			$result.="<td><div class='btn-group-sm'><button class='btn btn-info' title='Ganti Password'>GP</button><button class='btn btn-danger' title='Non-Aktifkan'>N-A</button></div></td>";
			$result.="</tr>";
			$no++;
		}
		return $result;
	}
} 