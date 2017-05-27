<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang20 extends CI_Controller {
	
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
			'brng20' => $this->model->GetBrng20('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng20 desc')->result_array(),
		);
		
		$this->load->view('admin/borang20/index', $data1);
	}
	
	function inputbrng20(){
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang20/inputbrng20');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng20(){
		

		
		$id_brng20 = '';
		$id_mtk = $_POST['id_mtk'];
		$kelas = $_POST['kelas'];
		$id_dsn = $_POST['id_dsn'];
		$jml_peserta = $_POST['jml_peserta'];
		$ipk_kelas = $_POST['ipk_kelas'];
		$ipk_mtk = $_POST['ipk_mtk'];
$id_jadwal = $this->session->userdata('id_jadwal');
		
		
		$data = array(	
			'id_brng20'=> $id_brng20,
			'id_mtk' => $id_mtk,
			'kelas' => $kelas,
			'id_dsn' => $id_dsn,
			'jml_peserta' => $jml_peserta,
			'ipk_kelas' => $ipk_kelas,
			'ipk_mtk' => $ipk_mtk,
			'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng20', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang20/index');

	}

	function editbrng20($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng20("where id_brng20 = '$kode'")->result_array();

		$data = array(
		
			'id_brng20' => $row[0]['id_brng20'],
			'id_mtk' => $row[0]['id_mtk'],
			'kelas' => $row[0]['kelas'],
			'id_dsn' => $row[0]['id_dsn'],
			'jml_peserta' => $row[0]['jml_peserta'],
			'ipk_kelas' => $row[0]['ipk_kelas'],
			'ipk_mtk' => $row[0]['ipk_mtk'],
			'id_jadwal' => $row[0]['id_jadwal'],
			);

		$this->load->view('admin/borang20/editbrng20', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng20(){

		$data = array(
			'id_brng20' => $this->input->post('id_brng20'),
			'kelas' => $this->input->post('kelas'),
			'id_dsn' => $this->input->post('id_dsn'),
			'id_mtk' => $this->input->post('id_mtk'),
			'jml_peserta' => $this->input->post('jml_peserta'),
			'ipk_kelas' => $this->input->post('ipk_kelas'),
			'ipk_mtk' => $this->input->post('ipk_mtk'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng20($data);
		if($res=1){
			header('location:'.base_url().'borang20/index');
		}else{
			header('location:'.base_url().'borang20/index/0');
		}
	}

	function hapusbrng20($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng20',array('id_brng20' => $kode));
		if($result == 1){
			header('location:'.base_url().'admin/borang20/index');
		}else{
			header('location:'.base_url().'admin/borang20/index');
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