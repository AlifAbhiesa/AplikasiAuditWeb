<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang25 extends CI_Controller {
	
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
			'brng25' => $this->model->GetBrng25('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng25 desc')->result_array(),
		);
		
		$this->load->view('admin/borang25/index', $data1);
	}
	
	function inputbrng25(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/borang25/inputbrng25');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng25(){
		$row = $this->model->GetBrng25("where id_brng25 = '$kode'")->result_array();

		
		$id_brng25 = '';
		$id_mhs = $_POST['id_mhs'];
		$status = $_POST['status'];
		$reg_akhir = $_POST['reg_akhir'];
		$bts_studi = $_POST['bts_studi'];
		$id_dsn = $_POST['id_dsn'];
		$stts_keluar = $_POST['stts_keluar'];
$id_jadwal = $this->session->userdata('id_jadwal');
		$mundur_pertama = $_POST['mundur_pertama'];
		
		$data = array(	
			'id_brng25'=> $id_brng25,
			'id_mhs' => $id_mhs,
			'status' => $status,
			'reg_akhir' => $reg_akhir,
			'bts_studi' => $bts_studi,
			'id_dsn' => $id_dsn,
			'stts_keluar' => $stts_keluar,
			'mundur_pertama' => $mundur_pertama,
'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng25', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang25/index');

	}

	function editbrng25($kode = 0){
		
		if($this->session->userdata('admin') == 1){
		$row = $this->model->GetBrng25("where id_brng25 = '$kode'")->result_array();

		$data = array(
		
			'id_brng25' => $row[0]['id_brng25'],
			'id_mhs' => $row[0]['id_mhs'],
			'status' => $row[0]['status'],
			'reg_akhir' => $row[0]['reg_akhir'],
			'bts_studi' => $row[0]['bts_studi'],
			'id_dsn' => $row[0]['id_dsn'],
			'stts_keluar' => $row[0]['stts_keluar'],
			'mundur_pertama' => $row[0]['mundur_pertama'],
'id_jadwal' => $row[0]['id_jadwal'],
			);

		$this->load->view('admin/borang25/editbrng25', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng25(){

		$data = array(
			'id_brng25' => $this->input->post('id_brng25'),
			'id_mhs' => $this->input->post('id_mhs'),
			'status' => $this->input->post('status'),
			'reg_akhir' => $this->input->post('reg_akhir'),
			'bts_studi' => $this->input->post('bts_studi'),
			'id_dsn' => $this->input->post('id_dsn'),
			'stts_keluar' => $this->input->post('stts_keluar'),
			'mundur_pertama' => $this->input->post('mundur_pertama'),
'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng25($data);
		if($res=1){
			header('location:'.base_url().'borang25/index');
		}else{
			header('location:'.base_url().'borang25/index/0');
		}
		
	}

	function hapusbrng25($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_brng25',array('id_brng25' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang25/index');
		}else{
			header('location:'.base_url().'borang25/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}
	

}