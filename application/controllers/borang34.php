<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang34 extends CI_Controller {
	
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
		$data1 = array(
			'brng34' => $this->model->GetBrng34('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng34 desc')->result_array(),
		);
		
		$this->load->view('admin/borang34/index', $data1);
	}
	
	function inputbrng34(){
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang34/inputbrng34');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng34(){
		$row = $this->model->GetBrng34("where id_brng34 = '$kode'")->result_array();

		
		$id_brng34 = '';
		$karya = $_POST['karya'];
		$waktu_daftar = $_POST['waktu_daftar'];
		$waktu_dapat = $_POST['waktu_dapat'];
	
$id_jadwal = $this->session->userdata('id_jadwal');
		
		
		$data = array(	
			'id_brng34'=> $id_brng34,
			'karya' => $karya,
			'waktu_daftar' => $waktu_daftar,
			'waktu_dapat' => $waktu_dapat,
		
			'id_jadwal' => $id_jadwal,

			);

		$this->model->Simpan('tbl_brng34', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang34/index');

	}

	function editbrng34($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng34("where id_brng34 = '$kode'")->result_array();

		$data = array(
		
			'id_brng34' => $row[0]['id_brng34'],
			'karya' => $row[0]['karya'],
			'waktu_daftar' => $row[0]['waktu_daftar'],
			'waktu_dapat' => $row[0]['waktu_dapat'],

'id_jadwal' => $row[0]['id_jadwal'],
			
			
			);

		$this->load->view('admin/borang34/editbrng34', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng34(){

		$data = array(
			'id_brng34' => $this->input->post('id_brng34'),
			'karya' => $this->input->post('karya'),
			'waktu_daftar' => $this->input->post('waktu_daftar'),
			'waktu_dapat' => $this->input->post('waktu_dapat'),
'id_jadwal' => $this->input->post('id_jadwal'),

			);

		$res = $this->model->UpdateBrng34($data);
		if($res=1){
			header('location:'.base_url().'borang34/index');
		}else{
			header('location:'.base_url().'borang34/index/0');
		}
	}

	function hapusbrng34($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng34',array('id_brng34' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang34/index');
		}else{
			header('location:'.base_url().'borang34/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}