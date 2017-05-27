<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang33 extends CI_Controller {
	
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
			'brng33' => $this->model->GetBrng33('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng33 desc')->result_array(),
		);
		
		$this->load->view('admin/borang33/index', $data1);
	}
	
	function inputbrng33(){
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang33/inputbrng33');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng33(){
		$row = $this->model->GetBrng33("where id_brng33 = '$kode'")->result_array();

		
		$id_brng33 = '';
		$nama_instansi = $_POST['nama_instansi'];
		$jenis_kegiatan = $_POST['jenis_kegiatan'];
		$awal_kerjasama = $_POST['awal_kerjasama'];
		$akhir_kerjasama = $_POST['akhir_kerjasama'];
		$manfaat = $_POST['manfaat'];
		$dalam_negri = $_POST['dalam_negri'];
		$luar_negri = $_POST['luar_negri'];
$id_jadwal = $this->session->userdata('id_jadwal');
				
		$data = array(	
			'id_brng33'=> $id_brng33,
			'nama_instansi' => $nama_instansi,
			'jenis_kegiatan' => $jenis_kegiatan,
			'awal_kerjasama' => $awal_kerjasama,
			'akhir_kerjasama' => $akhir_kerjasama,
			'manfaat' => $manfaat,
			'dalam_negri' => $dalam_negri,
			'luar_negri' => $luar_negri,
'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng33', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang33/index');

	}

	function editbrng33($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng33("where id_brng33 = '$kode'")->result_array();

		$data = array(
		
			'id_brng33' => $row[0]['id_brng33'],
			'nama_instansi' => $row[0]['nama_instansi'],
			'jenis_kegiatan' => $row[0]['jenis_kegiatan'],
			'awal_kerjasama' => $row[0]['awal_kerjasama'],
			'akhir_kerjasama' => $row[0]['akhir_kerjasama'],
			'manfaat' => $row[0]['manfaat'],
			'dalam_negri' => $row[0]['dalam_negri'],
			'luar_negri' => $row[0]['luar_negri'],
			'id_jadwal' => $row[0]['id_jadwal'],
			);

		$this->load->view('admin/borang33/editbrng33', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng33(){

		$data = array(
			'id_brng33' => $this->input->post('id_brng33'),
			'nama_instansi' => $this->input->post('nama_instansi'),
			'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
			'awal_kerjasama' => $this->input->post('awal_kerjasama'),
			'akhir_kerjasama' => $this->input->post('akhir_kerjasama'),
			'manfaat' => $this->input->post('manfaat'),
			'dalam_negri' => $this->input->post('dalam_negri'),
			'luar_negri' => $this->input->post('luar_negri'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng33($data);
		if($res=1){
			header('location:'.base_url().'borang33/index');
		}else{
			header('location:'.base_url().'borang33/index/0');
		}
	}

	function hapusbrng33($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng33',array('id_brng33' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang33/index');
		}else{
			header('location:'.base_url().'borang33/index');
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