<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang30 extends CI_Controller {
	
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
			'brng30' => $this->model->GetBrng30('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng30 desc')->result_array(),
		);
		
		$this->load->view('admin/borang30/index', $data1);
	}
	
	function inputbrng30(){
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang30/inputbrng30');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng30(){
		$row = $this->model->GetBrng30("where id_brng30 = '$kode'")->result_array();

		
		$id_brng30 = '';
		$judul_buku = $_POST['judul_buku'];
		$id_mtk = $_POST['id_mtk'];
		$bln_thn = $_POST['bln_thn'];
		$asli_terjemah = $_POST['asli_terjemah'];
		$id_dsn = $_POST['id_dsn'];
		$tk_lokal = $_POST['tk_lokal'];
		$tk_nasional = $_POST['tk_nasional'];
		$tk_internasional = $_POST['tk_internasional'];
$id_jadwal = $this->session->userdata('id_jadwal');
		
		$data = array(	
			'id_brng30'=> $id_brng30,
			'judul_buku' => $judul_buku,
			'id_mtk' => $id_mtk,
			'bln_thn' => $bln_thn,
			'asli_terjemah' => $asli_terjemah,
			'id_dsn' => $id_dsn,
			'tk_lokal' => $tk_lokal,
			'tk_nasional' => $tk_nasional,
			'tk_internasional' => $tk_internasional,
'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng30', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang30/index');

	}

	function editbrng30($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng30("where id_brng30 = '$kode'")->result_array();

		$data = array(
		
			'id_brng30' => $row[0]['id_brng30'],
			'judul_buku' => $row[0]['judul_buku'],
			'id_mtk' => $row[0]['id_mtk'],
			'bln_thn' => $row[0]['bln_thn'],
			'asli_terjemah' => $row[0]['asli_terjemah'],
			'id_dsn' => $row[0]['id_dsn'],
			'tk_lokal' => $row[0]['tk_lokal'],
			'tk_nasional' => $row[0]['tk_nasional'],
			'tk_internasional' => $row[0]['tk_internasional'],
'id_jadwal' => $row[0]['id_jadwal'],
			);

		$this->load->view('admin/borang30/editbrng30', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng30(){

		$data = array(
			'id_brng30' => $this->input->post('id_brng30'),
			'judul_buku' => $this->input->post('judul_buku'),
			'id_mtk' => $this->input->post('id_mtk'),
			'bln_thn' => $this->input->post('bln_thn'),
			'asli_terjemah' => $this->input->post('asli_terjemah'),
			'id_dsn' => $this->input->post('id_dsn'),
			'tk_lokal' => $this->input->post('tk_lokal'),
			'tk_nasional' => $this->input->post('tk_nasional'),
			'tk_internasional' => $this->input->post('tk_internasional'),
'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng30($data);
		if($res=1){
			header('location:'.base_url().'borang30/index');
		}else{
			header('location:'.base_url().'borang30/index/0');
		}
	}

	function hapusbrng30($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng30',array('id_brng30' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang30/index');
		}else{
			header('location:'.base_url().'borang30/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}