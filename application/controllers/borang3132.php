<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang3132 extends CI_Controller {
	
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
			'brng3132' => $this->model->GetBrng3132('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng3132 desc')->result_array(),
		);
		
		$this->load->view('admin/borang3132/index', $data1);
	}
	
	function inputbrng3132(){
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang3132/inputbrng3132');
		
}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng3132(){
		$row = $this->model->GetBrng3132("where id_brng3132 = '$kode'")->result_array();

		
		$id_brng3132 = '';
		$judul_kegiatan = $_POST['judul_kegiatan'];
		$tempat = $_POST['tempat'];
		$waktu = $_POST['waktu'];
		$jml_dana = $_POST['jml_dana'];
		$id_dsn = $_POST['id_dsn'];
		$hibah_pengabdian = $_POST['hibah_pengabdian'];
$id_jadwal = $this->session->userdata('id_jadwal');
				
		$data = array(	
			'id_brng3132'=> $id_brng3132,
			'judul_kegiatan' => $judul_kegiatan,
			'tempat' => $tempat,
			'waktu' => $waktu,
			'jml_dana' => $jml_dana,
			'id_dsn' => $id_dsn,
			'hibah_pengabdian' => $hibah_pengabdian,
'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng3132', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang3132/index');

	}

	function editbrng3132($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng3132("where id_brng3132 = '$kode'")->result_array();

		$data = array(
		
			'id_brng3132' => $row[0]['id_brng3132'],
			'judul_kegiatan' => $row[0]['judul_kegiatan'],
			'tempat' => $row[0]['tempat'],
			'waktu' => $row[0]['waktu'],
			'jml_dana' => $row[0]['jml_dana'],
			'id_dsn' => $row[0]['id_dsn'],
			'hibah_pengabdian' => $row[0]['hibah_pengabdian'],
			'id_jadwal' => $row[0]['id_jadwal'],
			);

		$this->load->view('admin/borang3132/editbrng3132', $data);
		
}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng3132(){

		$data = array(
			'id_brng3132' => $this->input->post('id_brng3132'),
			'judul_kegiatan' => $this->input->post('judul_kegiatan'),
			'tempat' => $this->input->post('tempat'),
			'waktu' => $this->input->post('waktu'),
			'jml_dana' => $this->input->post('jml_dana'),
			'id_dsn' => $this->input->post('id_dsn'),
			'hibah_pengabdian' => $this->input->post('hibah_pengabdian'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng3132($data);
		if($res=1){
			header('location:'.base_url().'borang3132/index');
		}else{
			header('location:'.base_url().'borang3132/index/0');
		}
	}

	function hapusbrng3132($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng3132',array('id_brng3132' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang3132/index');
		}else{
			header('location:'.base_url().'borang3132/index');
		}
		
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}