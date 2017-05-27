<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang1719 extends CI_Controller {
	
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
			'brng1719' => $this->model->GetBrng1719('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng1719 desc')->result_array(),
		);
		
		$this->load->view('admin/borang1719/index', $data1);
	}
	
	function inputbrng1719(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/borang1719/inputbrng1719');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng1719(){
		
		$id_brng1719 = '';
		$id_mhs = $_POST['id_mhs'];
		$tgl_lulus = $_POST['tgl_lulus'];
		$ipk = $_POST['ipk'];
		$lama_studi = $_POST['lama_studi'];
		$lama_ta = $_POST['lama_ta'];
		$id_jadwal = $this->session->userdata('id_jadwal');
		
		$data = array(	
			'id_brng1719'=> $id_brng1719,
			'id_mhs' => $id_mhs,
			'tgl_lulus' => $tgl_lulus,
			'ipk' => $ipk,
			'lama_studi' => $lama_studi,
			'lama_ta' => $lama_ta,
			'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng1719', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang1719/index');

	}

	function editbrng1719($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->GetBrng1719("where id_brng1719 = '$kode'")->result_array();

		$data = array(
		
			'id_brng1719' => $row[0]['id_brng1719'],
			'id_mhs' => $row[0]['id_mhs'],
			'tgl_lulus' => $row[0]['tgl_lulus'],
			'ipk' => $row[0]['ipk'],
			'lama_studi' => $row[0]['lama_studi'],
			'lama_ta' => $row[0]['lama_ta'],
			'id_jadwal' => $row[0]['id_jadwal'],			
			);

		$this->load->view('admin/borang1719/editbrng1719', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng1719(){

		$data = array(
			'id_brng1719' => $this->input->post('id_brng1719'),
			'tgl_lulus' => $this->input->post('tgl_lulus'),
			'ipk' => $this->input->post('ipk'),
			'lama_studi' => $this->input->post('lama_studi'),
			'lama_ta' => $this->input->post('lama_ta'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			
			);

		$res = $this->model->UpdateBrng1719($data);
		if($res=1){
			header('location:'.base_url().'borang1719/index');
		}else{
			header('location:'.base_url().'borang1719/index/0');
		}
	}

	function hapusbrng1719($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_brng1719',array('id_brng1719' => $kode));
		if($result == 1){
			header('location:'.base_url().'admin/borang1719/index');
		}else{
			header('location:'.base_url().'admin/borang1719/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}