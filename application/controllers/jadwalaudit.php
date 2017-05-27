<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwalaudit extends CI_Controller {
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
			'jadwal' => $this->model->Getjadwalaudit('order by id_jadwal desc')->result_array(),
		);
		$this->load->view('admin/jadwalaudit/index', $data1);
	}
	
	function inputjadwalaudit(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/jadwalaudit/inputjadwalaudit');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}
	

	function simpanjadwalaudit(){
		
		$id_jadwal = $_POST['id_jadwal'];
        $tahun = $_POST['tahun'];
		$semester = $_POST['semester'];
	    $tgl_visitasi = $_POST['tgl_visitasi'];
		$id_jrsn = $_POST['id_jrsn'];

		$data = array(	
            'id_jadwal'=>$id_jadwal,
			'tahun'=> $tahun,
			'semester' => $semester,
			'tgl_visitasi' => $tgl_visitasi,
			'id_jrsn' => $id_jrsn,
			);

		$this->model->Simpan('tbl_jadwal', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('jadwalaudit/index');

	}

	function editjadwalaudit($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->Getjadwalaudit("where id_jadwal = '$kode'")->result_array();

		$data = array(
            'id_jadwal' => $row[0]['id_jadwal'],
			'tahun' => $row[0]['tahun'],
			'semester' => $row[0]['semester'],
			'tgl_visitasi' => $row[0]['tgl_visitasi'],
			'id_jrsn' => $row[0]['id_jrsn'],
			
		);

		$this->load->view('admin/jadwalaudit/editjadwalaudit', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatejadwalaudit(){

		$data = array(
            'id_jadwal' => $this->input->post('id_jadwal'),
			'tahun' => $this->input->post('tahun'),
			'semester' => $this->input->post('semester'),
			'tgl_visitasi' => $this->input->post('tgl_visitasi'),
			
			);

		$res = $this->model->updatejadwalaudit($data);
		if($res=1){
			header('location:'.base_url().'jadwalaudit/index');
		}else{
			header('location:'.base_url().'jadwalaudit/0');
		}
	}

	function hapusjadwalaudit($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_jadwal',array('id_jadwal' => $kode));
		if($result == 1){
			header('location:'.base_url().'jadwalaudit/index');
		}else{
			header('location:'.base_url().'jadwalaudit/0');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}