<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auditor extends CI_Controller {
	
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
			'auditor' => $this->model->Getauditor('where tbl_auditor.id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_auditor desc')->result_array(),
		);
		
		$this->load->view('admin/auditor/index', $data1);
	}
	
	function inputauditor(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/auditor/inputauditor');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanauditor(){
		

		
		$id_auditor = '';
		$id_dsn = $_POST['id_dsn'];
		$id_jadwal = $_POST['id_jadwal'];
		
		
		$data = array(	
			'id_auditor'=> $id_auditor,
			'id_dsn' => $id_dsn,
			'id_jadwal' => $id_jadwal,
			
			
			
			);

		$this->model->Simpan('tbl_auditor', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/auditor/index');

	}

	function editauditor($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->Getauditor("where id_auditor = '$kode'")->result_array();

		$data = array(
		
			'id_auditor' => $row[0]['id_auditor'],
			'id_dsn' => $row[0]['id_dsn'],
			'id_jadwal' => $row[0]['id_jadwal'],
			
			
			);

		$this->load->view('admin/auditor/editauditor', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updateauditor(){

		$data = array(
			'id_auditor' => $this->input->post('id_auditor'),
			'id_dsn' => $this->input->post('id_dsn'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			
			);

		$res = $this->model->Updateauditor($data);
		if($res=1){
			header('location:'.base_url().'auditor/index');
		}else{
			header('location:'.base_url().'auditor/index/0');
		}
	}

	function hapusauditor($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_auditor',array('id_auditor' => $kode));
		if($result == 1){
			header('location:'.base_url().'auditor/index');
		}else{
			header('location:'.base_url().'auditor/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	
}