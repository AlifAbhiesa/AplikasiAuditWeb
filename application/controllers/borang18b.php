<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang18b extends CI_Controller {
	
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
			'brng18b' => $this->model->GetBrng18b('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng18b desc')->result_array(),
		);
		
		$this->load->view('admin/borang18b/index', $data1);
	}
	
	function inputbrng18b(){
		if($this->session->userdata('admin') == 1){ 

		$this->load->view('admin/borang18b/inputbrng18b');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng18b(){
		

		
		$id_brng18b = '';
		$id_mhs = $_POST['id_mhs'];
		$stts_kuliah = $_POST['stts_kuliah'];
		$reg_akhir = $_POST['reg_akhir'];
$id_jadwal = $this->session->userdata('id_jadwal');
		
		
		$data = array(	
			'id_brng18b'=> $id_brng18b,
			'id_mhs' => $id_mhs,
			'stts_kuliah' => $stts_kuliah,
			'reg_akhir' => $reg_akhir,
'id_jadwal' => $id_jadwal,
			
			
			);

		$this->model->Simpan('tbl_brng18b', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang18b/index');

	}

	function editbrng18b($kode = 0){
		if($this->session->userdata('admin') == 1){ 

		$row = $this->model->GetBrng18b("where id_brng18b = '$kode'")->result_array();

		$data = array(
		
			'id_brng18b' => $row[0]['id_brng18b'],
			'id_mhs' => $row[0]['id_mhs'],
			'stts_kuliah' => $row[0]['stts_kuliah'],
			'reg_akhir' => $row[0]['reg_akhir'],
			'id_jadwal' => $row[0]['id_jadwal'],
			);

		$this->load->view('admin/borang18b/editbrng18b', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng18b(){

		$data = array(
			'id_brng18b' => $this->input->post('id_brng18b'),
			'id_mhs' => $this->input->post('id_mhs'),
			'stts_kuliah' => $this->input->post('stts_kuliah'),
			'reg_akhir' => $this->input->post('reg_akhir'),
'id_jadwal' => $this->input->post('id_jadwal'),
			
);

		$res = $this->model->UpdateBrng18b($data);
		if($res=1){
			header('location:'.base_url().'borang18b/index');
		}else{
			header('location:'.base_url().'borang18b/index/0');
		}
	}

	function hapusbrng18b($kode = 0){
		if($this->session->userdata('admin') == 1){ 

		$result = $this->model->Hapus('tbl_brng18b',array('id_brng18b' => $kode));
		if($result == 1){
			header('location:'.base_url().'admin/borang18b/index');
		}else{
			header('location:'.base_url().'admin/borang18b/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}