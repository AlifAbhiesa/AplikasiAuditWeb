<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang17 extends CI_Controller {
	
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
		
			'brng17' => $this->model->GetBrng17('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng17 desc')->result_array(),
		);
		
		$this->load->view('admin/borang17/index', $data1);
	}
	
	function inputbrng17(){
		if($this->session->userdata('admin') == 1){ 

		$this->load->view('admin/borang17/inputbrng17');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng17(){
		$row = $this->model->GetBrng17("where id_brng17 = '$kode'")->result_array();

		
		
		$id_brng17 = '';
		$id_mtk = $_POST['id_mtk'];
		$kelas = $_POST['kelas'];
		$rkpss = $_POST['rkpss'];
		$kmbl_tgs_kuis = $_POST['kmbl_tgs_kuis'];
		$sol_uts = $_POST['sol_uts'];
		$sol_uas = $_POST['sol_uas'];
		$kmbl_uts_uas = $_POST['kmbl_uts_uas'];
		$msk_nil_uts = $_POST['msk_nil_uts'];
		$msk_nil_uas = $_POST['msk_nil_uas'];
		$id_jadwal = $this->session->userdata('id_jadwal');
		
		$data = array(	
			'id_brng17'=> $id_brng17,
			'id_mtk' => $id_mtk,
			'kelas' => $kelas,
			'rkpss' => $rkpss,
			'kmbl_tgs_kuis' => $kmbl_tgs_kuis,
			'sol_uts' => $sol_uts,
			'sol_uas' => $sol_uas,
			'kmbl_uts_uas' => $kmbl_uts_uas,
			'msk_nil_uts' => $msk_nil_uts,
			'msk_nil_uas' => $msk_nil_uas,
			'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng17', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang17/index');

	}

	function editbrng17($kode = 0){
		if($this->session->userdata('admin') == 1){ 

		$row = $this->model->GetBrng17("where id_brng17 = '$kode'")->result_array();

		$data = array(
		
			'id_brng17' => $row[0]['id_brng17'],
			'id_mtk' => $row[0]['id_mtk'],
			'kelas' => $row[0]['kelas'],
			'rkpss' => $row[0]['rkpss'],
			'kmbl_tgs_kuis' => $row[0]['kmbl_tgs_kuis'],
			'sol_uts' => $row[0]['sol_uts'],
			'sol_uas' => $row[0]['sol_uas'],
			'kmbl_uts_uas' => $row[0]['kmbl_uts_uas'],
			'msk_nil_uts' => $row[0]['msk_nil_uts'],
			'msk_nil_uas' => $row[0]['msk_nil_uas'],
			'id_jadwal' => $row[0]['id_jadwal'],
		);

		$this->load->view('admin/borang17/editbrng17', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng17(){

		$data = array(
			'id_brng17' => $this->input->post('id_brng17'),
			'kelas' => $this->input->post('kelas'),
			'rkpss' => $this->input->post('rkpss'),
			'kmbl_tgs_kuis' => $this->input->post('kmbl_tgs_kuis'),
			'sol_uts' => $this->input->post('sol_uts'),
			'sol_uas' => $this->input->post('sol_uas'),
			'kmbl_uts_uas' => $this->input->post('kmbl_uts_uas'),
			'msk_nil_uts' => $this->input->post('msk_nil_uts'),
			'msk_nil_uas' => $this->input->post('msk_nil_uas'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng17($data);
		if($res=1){
			header('location:'.base_url().'borang17/index');
		}else{
			header('location:'.base_url().'borang17/index/0');
		}
	}

	function hapusbrng17($kode = 0){
		if($this->session->userdata('admin') == 1){ 

		$result = $this->model->Hapus('tbl_brng17',array('id_brng17' => $kode));
		if($result == 1){
			header('location:'.base_url().'admin/borang17/index');
		}else{
			header('location:'.base_url().'admin/borang17/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}