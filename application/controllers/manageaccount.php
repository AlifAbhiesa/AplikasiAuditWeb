<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageaccount extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('admin')){            
			redirect(base_url().'home');
		}
	}
	
	
	public function index()
	{
		if($this->session->userdata('admin') == 1){
		$data1 = array(
			'account' => $this->model->Getmanageaccount('where id_user != 1 order by id_user desc')->result_array(),
		);
		
		$this->load->view('admin/ManageAccount/index', $data1);
		}
		else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		redirect(base_url("Mahasiswa"));
		}
	}
	
	function inputmanageaccount(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/ManageAccount/inputmanageaccount');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		redirect(base_url());
	}
	}

	function simpanmanageaccount(){
		

		
		$id_user = '';
		$nama_user = $_POST['nama_user'];
		$pass_user = $_POST['pass_user'];
 $level= 2;
		$data = array(	
			'id_user'=> $id_user,
			'nama_user' => $nama_user,
			'pass_user' => $pass_user,
 'level' => $level,
 
			);

		$this->model->Simpan('tb_login', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/ManageAccount/index');

	}

	function editmanageaccount($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->Getmanageaccount("where id_user = '$kode'")->result_array();

		$data = array(
		
			'id_user' => $row[0]['id_user'],
			'nama_user' => $row[0]['nama_user'],
			'pass_user' => $row[0]['pass_user'],
 		
			);

		$this->load->view('admin/ManageAccount/editmanageaccount', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatemanageaccount(){

		$data = array(
			'id_user' => $this->input->post('id_user'),
			'nama_user' => $this->input->post('nama_user'),
			'pass_user' => $this->input->post('pass_user'),
 			
			);

		$res = $this->model->Updatemanageaccount($data);
		if($res=1){
			header('location:'.base_url().'ManageAccount/index');
		}else{
			header('location:'.base_url().'ManageAccount/index/0');
		}
	}
	
	function changepass(){

		$data = array(
			'id_user' => $this->input->post('id_user'),
			'nama_user' => $this->input->post('nama_user'),
			'pass_user' => $this->input->post('pass_user'),
 			
			);

		$res = $this->model->Updatemanageaccount($data);
		if($res=1){
			header('location:'.base_url().'Mahasiswa/index');
		}else{
			header('location:'.base_url().'Mahasiswa/index/0');
		}
	}

	function hapusmanageaccount($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tb_login',array('id_user' => $kode));
		if($result == 1){
			header('location:'.base_url().'ManageAccount/index');
		}else{
			header('location:'.base_url().'ManageAccount/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	
}