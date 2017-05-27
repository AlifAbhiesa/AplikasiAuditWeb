<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
	
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
			'kegiatan' => $this->model->GetKegiatan('order by id_kegiatan desc')->result_array(),
		);
		
		$this->load->view('admin/kegiatan/index', $data1);
	}
	
	function inputkegiatan(){
		$this->load->view('admin/kegiatan/inputkegiatan');
	}

	function simpankegiatan(){

    	$id_kegiatan = '';
		$nama_kegiatan = $_POST['nama_kegiatan'];
		$tahun = $_POST['tahun'];

		$data = array(	
			'id_kegiatan'=> $id_kegiatan,
			'nama_kegiatan' => $nama_kegiatan,
			'tahun' => $tahun,
			
			);

		$this->model->Simpan('tbl_kegiatan', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/kegiatan/index');

	}

	function editkegiatan($kode = 0){
		$row = $this->model->GetKegiatan("where id_kegiatan = '$kode'")->result_array();

		$data = array(
		
			'id_kegiatan' => $row[0]['id_kegiatan'],
			'nama_kegiatan' => $row[0]['nama_kegiatan'],
			'tahun' => $row[0]['tahun'],
			);

		$this->load->view('admin/kegiatan/editkegiatan', $data);
	}

	function updatekegiatan(){

		$data = array(
			'id_kegiatan' => $this->input->post('id_kegiatan'),
			'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			'tahun' => $this->input->post('tahun'),
			);

		$res = $this->model->UpdateKegiatan($data);
		if($res=1){
			header('location:'.base_url().'kegiatan/index');
		}else{
			header('location:'.base_url().'kegiatan/index/0');
		}
	}

	function hapuskegiatan($kode = 0){
		$result = $this->model->Hapus('tbl_kegiatan',array('id_kegiatan' => $kode));
		if($result == 1){
			header('location:'.base_url().'admin/kegiatan/index');
		}else{
			header('location:'.base_url().'admin/kegiatan/index');
		}
	}

	public function cetakktp()
	{
		header('Content-type: application/vnd.ms-excel');
		header('Content-disposition: attachment; filename="ktp.xls"');

		$this->load->view('admin/printktp');
	}
}