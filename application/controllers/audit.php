<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audit extends CI_Controller {
	
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
			'audit' => $this->model->Getaudit('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_master_audit desc')->result_array(),
		);

	$periode = null;
		
		$this->load->view('admin/audit/index', $data1);
	}
	
	function inputaudit(){
		if($this->session->userdata('admin') != 1){
		

		$this->load->view('admin/audit/inputaudit');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUKAN AUITOR")</script>';	
		$this->index();
	}
	}

	function simpanaudit(){
		$row = $this->model->Getaudit("where id_master_audit = '$kode'")->result_array();

		$id_master_audit = $_POST['id_master_audit'];
		$pelaksanaan_kegiatan = $_POST['pelaksanaan_kegiatan'];
		$target_genap = $_POST['target_genap'];
		$permasalahan = $_POST['permasalahan'];
		$rencana_kegiatan_audit = $_POST['rencana_kegiatan_audit'];
		
		
		
		$data = array(	
			
			'id_master_audit' => $id_master_audit,
			'pelaksanaan_kegiatan' => $pelaksanaan_kegiatan,
			'target_genap' => $target_genap,
			'permasalahan' => $permasalahan,
			'rencana_kegiatan_audit' => $rencana_kegiatan_audit,
			
			
			);

		$this->model->Simpan('tbl_audit', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/audit/index');

	}

	function editaudit($kode = 0){
		
		if($this->session->userdata('admin') != 1){
		$row = $this->model->Getaudit("where id_master_audit = '$kode'")->result_array();

		$data = array(
		
			'id_master_audit' => $row[0]['id_master_audit'],
			'pelaksanaan_kegiatan' => $row[0]['pelaksanaan_kegiatan'],
			'target_genap' => $row[0]['target_genap'],
			'permasalahan' => $row[0]['permasalahan'],
			'rencana_kegiatan_audit' => $row[0]['rencana_kegiatan_audit'],
			
			
			);

		$this->load->view('admin/audit/editaudit', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUKAN AUITOR")</script>';	
		$this->index();
	}
	}

	function updateaudit(){

		$data = array(
			
			'id_master_audit' => $this->input->post('id_master_audit'),
			'pelaksanaan_kegiatan' => $this->input->post('pelaksanaan_kegiatan'),
			'target_genap' => $this->input->post('target_genap'),
			'permasalahan' => $this->input->post('permasalahan'),
			'rencana_kegiatan_audit' => $this->input->post('rencana_kegiatan_audit'),
			
			
			);

		$res = $this->model->Updateaudit($data);
		if($res=1){
			header('location:'.base_url().'audit/index');
		}else{
			header('location:'.base_url().'audit/index/0');
		}
		
	}

	function hapusaudit($kode = 0){
		if($this->session->userdata('admin') != 1){
		$result = $this->model->Hapus('tbl_audit',array('id_master_audit' => $kode));
		if($result == 1){
			header('location:'.base_url().'audit/index');
		}else{
			header('location:'.base_url().'audit/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUKAN AUITOR")</script>';	
		$this->index();
	}
	}
	

}