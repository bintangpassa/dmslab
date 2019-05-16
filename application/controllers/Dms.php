<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dms extends CI_Controller {
	protected $login=false;
 
	protected $id_user;
	protected $nama_user;
	protected $password_user;
	protected $level_user;

	function __construct(){
		parent::__construct();

		$this->load->library(array('form_validation'));
		//session_start();

		//Panggil database
		$this->load->database();

		//session
		$this->login=$this->session->userdata('login');	

		$this->load->model("Myuser","user");

		$this->login= $this->user->set($this->session->userdata('id_user'),$this->session->userdata('nama_user'),$this->session->userdata('password_user'));

		$this->id_user=$this->user->id;
		$this->id_laboran=$this->user->id_laboran;
		$this->nama_user=$this->user->nama;
		$this->password_user=$this->user->password;
		$this->level_user=$this->user->level;
		$this->nama_lengkap_user=$this->user->nama_lengkap;
	}

	public function index()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			redirect("dms/daftar_akun");
		}
	}

	

	public function login($x=''){
		if($this->login){
			redirect('dms');
		}
		$data['status']=$x;
		$this->load->view("login",$data);
	}

	public function proseslogin(){
		if($this->input->post()){
	 		$user=$this->input->post("inputUsername",TRUE);
	 		$pass=sha1(md5($this->input->post("inputPassword")));

	 		$cari=$this->db->get_where("user",array("nama_user"=>$user,"password_user"=>$pass,"status_user"=>"1","terhapus_user"=>"0"));

	 		if($cari->num_rows()<1){
	 			redirect("dms/login/1");
	 		}
	 		else{
	 			$row=$cari->row();
	 			
	 			$data_sessi=array('login'=>true,
	 						'id_user'=>$row->id_user,
	 						'nama_user'=>$row->nama_user,
	 						'password_user'=>$row->password_user,
	 						'level_user'=>$row->level_user);
	 			$this->session->set_userdata($data_sessi);
	 			redirect("dms");
	 		}

	 	}
	 	else{
	 		show_404();
		}
	}

	public function logout(){
		$data= array("login","id_user","nama_user","password_user","level_user","random_filemanager_key");
		$this->session->unset_userdata($data);
		redirect("dms");
	}

	public function chart()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$this->load->view('home_head');
			$this->load->view('area_chart');
			$this->load->view('home_foot');
		}
	}

	public function instruksi_kerja_al()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('instruksikerja_al');
			$this->load->view('home_foot');
		}
	}

	public function instruksi_kerja_histori_al()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('instruksikerja_histori_al');
			$this->load->view('home_foot');
		}
	}

	public function instruksi_kerja_unggah_al()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'id_laboran'=>$this->id_laboran,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('instruksikerja_unggah_al');
			$this->load->view('home_foot');
		}
	}

	public function instruksi_kerja_evaluasi_ku()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('instruksikerja_evaluasi_ku');
			$this->load->view('home_foot');
		}
	}

	public function instruksi_kerja_ku()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('instruksikerja_ku');
			$this->load->view('home_foot');
		}
	}

	public function instruksi_kerja_histori_ku()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('instruksikerja_histori_ku');
			$this->load->view('home_foot');
		}
	}

	public function ugh_tmod_al()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('ugh_tmod_al');
			$this->load->view('home_foot');
		}
	}

	public function mod_tertunda()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('mod_tunda');
			$this->load->view('home_foot');
		}
	}

	public function mod_al()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"",
				);

			$this->load->view('home_head',$data);
			$this->load->view('mod_al');
			$this->load->view('home_foot');
		}
	}

	public function buat_akun()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {
			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'npage'=>"buat_akun",
				);

			$this->load->view('home_head',$data);
			$this->load->view('buat_akun');
			$this->load->view('home_foot');
		}
	}

	public function daftar_akun()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {

			$this->load->model("Daftar_akun","akun");
			$this->dakun = $this->akun->get_akun();

			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'daftar_akun'=>$this->dakun,
				'npage'=>"",
				);
			$this->load->view('home_head',$data);
			$this->load->view('daftar_akun');
			$this->load->view('home_foot');
		}
	}

	public function cek_new_username(){
		$username=trim(($this->input->post('username')));
		//$query=$this->db->query("SELECT * FROM user WHERE name_user='$username' AND terhapus='N' ");
		$query=$this->db->get_where('user',array('nama_user'=>$username,'terhapus'=>'0'));
		if($query->num_rows()<1){
			echo "ok";
		} else{
			echo "terpakai";	
		} 
	}

	public function input_matakuliah()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {

			$this->load->model("Daftar_akun","akun");
			$this->dakun = $this->akun->get_akun();

			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'daftar_akun'=>$this->dakun,
				'npage'=>"atur_mk",
				);
			$this->load->view('home_head',$data);
			$this->load->view('input_matakuliah');
			$this->load->view('home_foot');
		}
	}

	public function atur_jenisdokumen()
	{
		if(!$this->login){
			redirect("dms/login");
		}
		else {

			$this->load->model("Daftar_akun","akun");
			$this->dakun = $this->akun->get_akun();

			$data=array(
				'title'=>"Home",
				'user'=>$this->nama_lengkap_user,
				'user_level'=>$this->level_user,
				'burl'=>base_url()."index.php/dms/",
				'daftar_akun'=>$this->dakun,
				'npage'=>"",
				);
			$this->load->view('home_head',$data);
			$this->load->view('atur_jenisdokumen');
			$this->load->view('home_foot');
		}
	}
}
