<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang2223 extends CI_Controller {
	
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
			'brng2223' => $this->model->GetBrng2223('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng2223 desc')->result_array(),
		);
		
		$this->load->view('admin/borang2223/index', $data1);
	}
	
	function inputbrng2223(){
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang2223/inputbrng2223');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng2223(){
		

		
		$id_brng2223 = '';
		$id_mtk = $_POST['id_mtk'];
		$sedia_gbpp = $_POST['sedia_gbpp'];
		$sedia_rkpss = $_POST['sedia_rkpss'];
		$id_jadwal = $this->session->userdata('id_jadwal');
		
		$data = array(	
			'id_brng2223'=> $id_brng2223,
			'id_mtk' => $id_mtk,
			'sedia_gbpp' => $sedia_gbpp,
			'sedia_rkpss' => $sedia_rkpss,
			'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng2223', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang2223/index');

	}

	function editbrng2223($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng2223("where id_brng2223 = '$kode'")->result_array();

		$data = array(
		
			'id_brng2223' => $row[0]['id_brng2223'],
			'id_mtk' => $row[0]['id_mtk'],
			'sedia_gbpp' => $row[0]['sedia_gbpp'],
			'sedia_rkpss' => $row[0]['sedia_rkpss'],
			'id_jadwal' => $row[0]['id_jadwal'],
			
			);

		$this->load->view('admin/borang2223/editbrng2223', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng2223(){

		$data = array(
			'id_brng2223' => $this->input->post('id_brng2223'),
			'id_mtk' => $this->input->post('id_mtk'),
			'sedia_gbpp' => $this->input->post('sedia_gbpp'),
			'sedia_rkpss' => $this->input->post('sedia_rkpss'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng2223($data);
		if($res=1){
			header('location:'.base_url().'borang2223/index');
		}else{
			header('location:'.base_url().'borang2223/index/0');
		}
	}

	function hapusbrng2223($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng2223',array('id_brng2223' => $kode));
		if($result == 1){
			header('location:'.base_url().'admin/borang2223/index');
		}else{
			header('location:'.base_url().'admin/borang2223/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	public function cetakktp()
	{
		header('Content-type: application/vnd.ms-excel');
		header('Content-disposition: attachment; filename="ktp.xls"');

		$this->load->view('admin/printktp');
	}
}