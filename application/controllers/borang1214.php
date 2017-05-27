<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang1214 extends CI_Controller {
	
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
			'brng1214' => $this->model->GetBrng1214('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng1214 desc')->result_array(),
		);
		
		$this->load->view('admin/borang1214/index', $data1);
	}
	
	function inputbrng1214(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/borang1214/inputbrng1214');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng1214(){
		$row = $this->model->GetBrng1214("where id_brng1214 = '$kode'")->result_array();

		
		$id_brng1214 = '';
		$id_mtk = $_POST['id_mtk'];
		$kelas = $_POST['kelas'];
		$hdr_asisten = $_POST['hdr_asisten'];
		$hdr_resp_mhsw = $_POST['hdr_resp_mhsw'];
		$hit_tk1 = $_POST['hit_tk1'];
		$hit_tk234 = $_POST['hit_tk234'];
$id_jadwal = $this->session->userdata('id_jadwal');
		
		$data = array(	
			'id_brng1214'=> $id_brng1214,
			'id_mtk' => $id_mtk,
			'kelas' => $kelas,
			'hdr_asisten' => $hdr_asisten,
			'hdr_resp_mhsw' => $hdr_resp_mhsw,
			'hit_tk1' => $hit_tk1,
			'hit_tk234' => $hit_tk234,
'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng1214', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang1214/index');

	}

	function editbrng1214($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->GetBrng1214("where id_brng1214 = '$kode'")->result_array();

		$data = array(
		
			'id_brng1214' => $row[0]['id_brng1214'],
			'id_mtk' => $row[0]['id_mtk'],
			'kelas' => $row[0]['kelas'],
			'hdr_asisten' => $row[0]['hdr_asisten'],
			'hdr_resp_mhsw' => $row[0]['hdr_resp_mhsw'],
			'hit_tk1' => $row[0]['hit_tk1'],
			'hit_tk234' => $row[0]['hit_tk234'],
'id_jadwal' => $row[0]['id_jadwal'],
			);

		$this->load->view('admin/borang1214/editbrng1214', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng1214(){

		$data = array(
			'id_brng1214' => $this->input->post('id_brng1214'),
			'kelas' => $this->input->post('kelas'),
			'hdr_asisten' => $this->input->post('hdr_asisten'),
			'hdr_resp_mhsw' => $this->input->post('hdr_resp_mhsw'),
			'hit_tk1' => $this->input->post('hit_tk1'),
			'hit_tk234' => $this->input->post('hit_tk234'),
'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng1214($data);
		if($res=1){
			header('location:'.base_url().'borang1214/index');
		}else{
			header('location:'.base_url().'borang1214/index/0');
		}
	}

	function hapusbrng1214($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_brng1214',array('id_brng1214' => $kode));
		if($result == 1){
			header('location:'.base_url().'admin/borang1214/index');
		}else{
			header('location:'.base_url().'admin/borang1214/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}