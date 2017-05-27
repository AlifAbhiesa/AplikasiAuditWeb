<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang2629 extends CI_Controller {
	
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
			'brng2629' => $this->model->GetBrng2629('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng2629 desc')->result_array(),
		);
		
		$this->load->view('admin/borang2629/index', $data1);
	}
	
	function inputbrng2629(){
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang2629/inputbrng2629');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng2629(){
		$row = $this->model->GetBrng2629("where id_brng2629 = '$kode'")->result_array();

		
		$id_brng2629 = '';
		$judul = $_POST['judul'];
		$id_dsn = $_POST['id_dsn'];
		$publikasi = $_POST['publikasi'];
		$bln_thn = $_POST['bln_thn'];
		$pub_lokal = $_POST['pub_lokal'];
		$pub_nas = $_POST['pub_nas'];
		$pub_inter = $_POST['pub_inter'];
		$penelitian = $_POST['penelitian'];
		$hibah_penelitian = $_POST['hibah_penelitian'];
		$dana_pribadi = $_POST['dana_pribadi'];
		$dana_lokal = $_POST['dana_lokal'];
		$dana_internasional = $_POST['dana_internasional'];
$id_jadwal = $this->session->userdata('id_jadwal');		
		$data = array(	
			'id_brng2629'=> $id_brng2629,
			'judul' => $judul,
			'id_dsn' => $id_dsn,
			'publikasi' => $publikasi,
			'bln_thn' => $bln_thn,
			'pub_lokal' => $pub_lokal,
			'pub_nas' => $pub_nas,
			'pub_inter' => $pub_inter,
			'penelitian' => $penelitian,
			'hibah_penelitian' => $hibah_penelitian,
			'dana_pribadi' => $dana_pribadi,
			'dana_lokal' => $dana_lokal,
			'dana_internasional' => $dana_internasional,
			'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng2629', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang2629/index');

	}

	function editbrng2629($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng2629("where id_brng2629 = '$kode'")->result_array();

		$data = array(
		
			'id_brng2629' => $row[0]['id_brng2629'],
			'judul' => $row[0]['judul'],
			'id_dsn' => $row[0]['id_dsn'],
			'publikasi' => $row[0]['publikasi'],
			'bln_thn' => $row[0]['bln_thn'],
			'pub_lokal' => $row[0]['pub_lokal'],
			'pub_nas' => $row[0]['pub_nas'],
			'pub_inter' => $row[0]['pub_inter'],
			'penelitian' => $row[0]['penelitian'],
			'hibah_penelitian' => $row[0]['hibah_penelitian'],
			'dana_pribadi' => $row[0]['dana_pribadi'],
			'dana_lokal' => $row[0]['dana_lokal'],
			'dana_internasional' => $row[0]['dana_internasional'],
'id_jadwal' => $row[0]['id_jadwal'],
			);

		$this->load->view('admin/borang2629/editbrng629', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng2629(){

		$data = array(
			'id_brng2629' => $this->input->post('id_brng2629'),
			'judul' => $this->input->post('judul'),
			'id_dsn' => $this->input->post('id_dsn'),
			'publikasi' => $this->input->post('publikasi'),
			'bln_thn' => $this->input->post('bln_thn'),
			'pub_lokal' => $this->input->post('pub_lokal'),
			'pub_nas' => $this->input->post('pub_nas'),
			'pub_inter' => $this->input->post('pub_inter'),
			'penelitian' => $this->input->post('penelitian'),
			'hibah_penelitian' => $this->input->post('hibah_penelitian'),
			'dana_pribadi' => $this->input->post('dana_pribadi'),
			'dana_lokal' => $this->input->post('dana_lokal'),
			'dana_internasional' => $this->input->post('dana_internasional'),
'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng25($data);
		if($res=1){
			header('location:'.base_url().'borang2629/index');
		}else{
			header('location:'.base_url().'borang2629/index/0');
		}
	}

	function hapusbrng2629($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng2629',array('id_brng2629' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang2629/index');
		}else{
			header('location:'.base_url().'borang2629/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	
}