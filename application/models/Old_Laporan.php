<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Model
{
	function __construct(){
		parent::__construct();
	}


	function get_laporan(){
		$query=$this->db->query("SELECT blog_id,judul FROM tbl_blogs ORDER BY blog_id ASC");

		$no=1;
		$result="";
		foreach ($query->result_array() as $laporan) {
			$query2=$this->db->query("SELECT COUNT(artikel_id) AS jumlah FROM artikel WHERE blog_id='$laporan[blog_id]' GROUP BY blog_id");
			
			foreach ($query2->result_array() as $re) {

				$r=$re['jumlah'].'  ';

			};

			$query3=$this->db->query("SELECT COUNT(page_id) AS jumlah FROM pages WHERE blog_id='$laporan[blog_id]' GROUP BY blog_id");
			
			foreach ($query3->result_array() as $re2) {

				$r2=$re2['jumlah'].'  ';

			};

			$query4=$this->db->query("SELECT COUNT(galeri_id) AS jumlah FROM galeri WHERE blog_id='$laporan[blog_id]' GROUP BY blog_id");
			
			foreach ($query4->result_array() as $re3) {

				$r3=$re3['jumlah'].' ';
			};
			
			$query5=$this->db->query("SELECT COUNT(galeri_id) AS jumlah FROM video WHERE blog_id='$laporan[blog_id]' GROUP BY blog_id");
			
			foreach ($query5->result_array() as $re4) {
				$r4=$re4['jumlah'].' ';
			};
			
			 


			$result.="<tr data-id='$laporan[blog_id]'>";
			$result.="<th class='nomor'>$no</th>";
			$result.="<th>

						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail/$laporan[blog_id]'>$laporan[judul]</a></span> 
						</th>";	
			$result.="<td>
						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail/1'>$r</a></span>
					</td>";	
			$result.="<td>
						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail/2'>$r2</a></span>
					</td>";	
			$result.="<td>
						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail/3'>$r3</a></span>
					</td>"; 
					
					
					$result.="<td>
						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail/4'>$r4</a></span>
					</td>"; 
			$result.="</tr>";

			$no++;
		};

		return $result;
	}
	
	
	
function get_laporan_detail($blog_id){ 

		$query=$this->db->query("SELECT * FROM user WHERE  blog_id ='$blog_id'   "); 
		$no=1;
		$result="";
		
		foreach ($query->result_array() as $laporan) {
			$query2=$this->db->query(" SELECT COUNT(artikel_id) AS jumlah FROM artikel WHERE artikel_id_user='$laporan[id_user]' GROUP BY blog_id ");
			
			foreach ($query2->result_array() as $re) {
					$r=$re['jumlah'].'  ';
			};

			$query3=$this->db->query("SELECT COUNT(page_id) AS jumlah FROM pages WHERE   page_id_user='$laporan[id_user]' GROUP BY blog_id");
			
			foreach ($query3->result_array() as $re2) {
					$r2=$re2['jumlah'].'  ';
			};

			$query4=$this->db->query("SELECT COUNT(galeri_id) AS jumlah FROM galeri WHERE blog_id='$blog_id' AND galeri_user='$laporan[id_user]' GROUP BY blog_id");
			
			foreach ($query4->result_array() as $re3) {
				$r3=$re3['jumlah'].' ';
			};
			
			$query5=$this->db->query("SELECT COUNT(galeri_id) AS jumlah FROM video WHERE blog_id='$blog_id' AND galeri_user='$laporan[id_user]' ");
			
			foreach ($query5->result_array() as $re4) {
				$r4=$re4['jumlah'].' ';
			};
			
			 

			$result.="<tr data-id='$laporan[blog_id]'>";
			$result.="<th class='nomor'>$no</th>";
			
			$result.="<th>
			 <span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail2/$blog_id/$laporan[id_user]/1'>$laporan[name_user]</a></span> 
						</th>";	
						
			$result.="<td>
						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail2/$blog_id/$laporan[id_user]/1'>$r</a></span>
					</td>";	
			$result.="<td>
						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail2/$blog_id/$laporan[id_user]/2'>$r2</a></span>
					</td>";	
			$result.="<td>
						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail2/$blog_id/$laporan[id_user]/3'>$r3</a></span>
					</td>"; 
					
					
					$result.="<td>
						<span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/laporandetail2/$blog_id/$laporan[id_user]/4'>$r4</a></span>
					</td>"; 

			$result.="</tr>";

			$no++;
		};

		return $result;
	}
	
	
	
	function get_laporan_detail2($blog_id,$userid,$jns){ 

	
	
		$query=$this->db->query("SELECT * ,  kategori.nama_kategori FROM artikel LEFT JOIN kategori ON kategori.id_kategori  = artikel.artikel_kategori  WHERE  artikel.blog_id ='$blog_id' AND artikel_id_user='$userid'  "); 
		$no=1;
		$result="";
		
		foreach ($query->result_array() as $laporan) {
		
		 
		 IF ($laporan['artikel_was_published']  =="Y") { 
			$status="Publish";
		 } ELSE {
			$status="Draft";
		 
		 }
				
				
				
			$result.="<tr data-id='$laporan[blog_id]'>";
			$result.="<th class='nomor'>$no</th>";
			
			$result.="<td>
			 <span class='' data-id='$laporan[blog_id]'><a href='http://localhost:90/portalkkp/admin/artikel/$laporan[artikel_id]'>  $laporan[artikel_judul]</a> </span> 
						</td>";	
						
			$result.="<td>
						<span class='' data-id=' '> $laporan[nama_kategori]</span>
					</td>";	
			$result.="<td>
						<span class='' data-id=' '>$status</span>
					</td>";	
			 
			$result.="</tr>";

			$no++;
		};

		return $result;
	}

	
} 