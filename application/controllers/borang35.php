<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang35 extends CI_Controller {
	
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
			'brng35' => $this->model->GetBrng35('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng35 desc')->result_array(),
		);
		
		$this->load->view('admin/borang35/index', $data1);
	}
	
	function inputbrng35(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/borang35/inputbrng35');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng35(){
		$row = $this->model->GetBrng35("where id_brng35 = '$kode'")->result_array();

		
		$id_brng35 = '';
		$id_dsn = $_POST['id_dsn'];
		$nama_org = $_POST['nama_org'];
		$kurun_wkt = $_POST['kurun_wkt'];
		$tk_lokal = $_POST['tk_lokal'];
		$tk_nasional = $_POST['tk_nasional'];
		$tk_internasional = $_POST['tk_internasional'];
$id_jadwal = $this->session->userdata('id_jadwal');
		
		$data = array(	
			'id_brng35'=> $id_brng35,
			'id_dsn' => $id_dsn,
			'nama_org' => $nama_org,
			'kurun_wkt' => $kurun_wkt,
			'tk_lokal' => $tk_lokal,
			'tk_nasional' => $tk_nasional,
			'tk_internasional' => $tk_internasional,
'id_jadwal' => $id_jadwal,
			
			);

		$this->model->Simpan('tbl_brng35', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang35/index');

	}

	function editbrng35($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->GetBrng35("where id_brng35 = '$kode'")->result_array();

		$data = array(
		
			'id_brng35' => $row[0]['id_brng35'],
			'id_dsn' => $row[0]['id_dsn'],
			'nama_org' => $row[0]['nama_org'],
			'kurun_wkt' => $row[0]['kurun_wkt'],
			'tk_lokal' => $row[0]['tk_lokal'],
			'tk_nasional' => $row[0]['tk_nasional'],
			'tk_internasional' => $row[0]['tk_internasional'],
'id_jadwal' => $row[0]['id_jadwal'],
			
			);

		$this->load->view('admin/borang35/editbrng35', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng35(){

		$data = array(
			'id_brng35' => $this->input->post('id_brng35'),
			'id_dsn' => $this->input->post('id_dsn'),
			'nama_org' => $this->input->post('nama_org'),
			'kurun_wkt' => $this->input->post('kurun_wkt'),
			'tk_lokal' => $this->input->post('tk_lokal'),
			'tk_nasional' => $this->input->post('tk_nasional'),
			'tk_internasional' => $this->input->post('tk_internasional'),
'id_jadwal' => $this->input->post('id_jadwal'),
			
			);

		$res = $this->model->UpdateBrng35($data);
		if($res=1){
			header('location:'.base_url().'borang35/index');
		}else{
			header('location:'.base_url().'borang35/index/0');
		}
	}

	function hapusbrng35($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_brng35',array('id_brng35' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang35/index');
		}else{
			header('location:'.base_url().'borang35/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}