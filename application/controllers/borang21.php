<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang21 extends CI_Controller {
	
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
			'brng21' => $this->model->GetBrng21('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng21 desc')->result_array(),
		);
		
		$this->load->view('admin/borang21/index', $data1);
	}
	
	function inputbrng21(){
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang21/inputbrng21');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function simpanbrng21(){
		

		
		$id_brng21 = '';
		$id_mhs = $_POST['id_mhs'];
		$sks_smester = $_POST['sks_smester'];
		$ips = $_POST['ips'];
		$sks_total = $_POST['sks_total'];
		$ipk = $_POST['ipk'];
$id_jadwal = $this->session->userdata('id_jadwal');
		
		
		
		$data = array(	
			'id_brng21'=> $id_brng21,
			'id_mhs' => $id_mhs,
			'sks_smester' => $sks_smester,
			'ips' => $ips,
			'sks_total' => $sks_total,
			'ipk' => $ipk,
			'id_jadwal' => $id_jadwal,
			
			);

		$this->model->Simpan('tbl_brng21', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/borang21/index');

	}

	function editbrng21($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng21("where id_brng21 = '$kode'")->result_array();

		$data = array(
		
			'id_brng21' => $row[0]['id_brng21'],
			'id_mhs' => $row[0]['id_mhs'],
			'sks_smester' => $row[0]['sks_smester'],
			'ips' => $row[0]['ips'],
			'sks_total' => $row[0]['sks_total'],
			'ipk' => $row[0]['ipk'],
'id_jadwal' => $row[0]['id_jadwal'],
			
			);

		$this->load->view('admin/borang21/editbrng21', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng21(){

		$data = array(
			'id_brng21' => $this->input->post('id_brng21'),
			'sks_smester' => $this->input->post('sks_smester'),
			'ips' => $this->input->post('ips'),
			'id_mhs' => $this->input->post('id_mhs'),
			'sks_total' => $this->input->post('sks_total'),
			'ipk' => $this->input->post('ipk'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->UpdateBrng21($data);
		if($res=1){
			header('location:'.base_url().'borang21/index');
		}else{
			header('location:'.base_url().'borang21/index/0');
		}
	}

	function hapusbrng21($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng21',array('id_brng21' => $kode));
		if($result == 1){
			header('location:'.base_url().'admin/borang21/index');
		}else{
			header('location:'.base_url().'admin/borang21/index');
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