<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang24 extends CI_Controller {
	
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
			'brng24' => $this->model->GetBrng24('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng24 desc')->result_array(),
		);
		
		$this->load->view('admin/borang24/index', $data1);
	}
	
	function inputbrng24(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/borang24/inputbrng24');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng24(){
		

		
		$id_brng24 = '';
		$nrp_mhs = $_POST['nrp_mhs'];
		$id_kegiatan = $_POST['id_kegiatan'];
		$id_jadwal = $this->session->userdata('id_jadwal');

		$data = array(	
			'id_brng24'=> $id_brng24,
			'nrp_mhs' => $nrp_mhs,
			'id_kegiatan' => $id_kegiatan,
'id_jadwal' => $id_jadwal,

			);

		$this->model->Simpan('tbl_brng24', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang24/index');

	}

	function editbrng24($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->GetBrng24("where id_brng24 = '$kode'")->result_array();

		$data = array(
		
			'id_brng24' => $row[0]['id_brng24'],
			'nrp_mhs' => $row[0]['nrp_mhs'],
			'id_kegiatan' => $row[0]['id_kegiatan'],
'id_jadwal' => $row[0]['id_jadwal'],
			
			
			);

		$this->load->view('admin/borang24/editbrng24', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng24(){

		$data = array(
			'id_brng24' => $this->input->post('id_brng24'),
			'nrp_mhs' => $this->input->post('nrp_mhs'),
			'id_kegiatan' => $this->input->post('id_kegiatan'),
'id_jadwal' => $this->input->post('id_jadwal'),
			
			);

		$res = $this->model->UpdateBrng24($data);
		if($res=1){
			header('location:'.base_url().'borang24/index');
		}else{
			header('location:'.base_url().'borang24/index/0');
		}
	}

	function hapusbrng24($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_brng24',array('id_brng24' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang24/index');
		}else{
			header('location:'.base_url().'borang24/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	
}