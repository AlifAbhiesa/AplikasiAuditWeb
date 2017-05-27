<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {
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
			'dsn' => $this->model->GetDsn('where id_jrsn = "'.$this->session->userdata('id_jrsn').'" order by id_dsn desc')->result_array(),
		);
		$this->load->view('admin/dosen/index', $data1);
	}
	
	function inputdsn(){
		
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/dosen/inputdsn');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}
	

	function simpandsn(){
		
		$id_dsn = '';
        $kode_dsn = $_POST['kode_dsn'];
		$nip_dsn = $_POST['nip_dsn'];
		$nama_dsn = $_POST['nama_dsn'];
		$email_dsn = $_POST['email_dsn'];
		$nohp_dsn = $_POST['nohp_dsn'];
		$alamat_dsn = $_POST['alamat_dsn'];
		$id_jrsn = $_POST['id_jrsn'];
		$jbtn_dsn = $_POST['jbtn_dsn'];
		

		$data = array(	
            'id_dsn'=>$id_dsn,
			'kode_dsn'=> $kode_dsn,
			'nama_dsn' => $nama_dsn,
			'email_dsn' => $email_dsn,
			'nohp_dsn' => $nohp_dsn,
			'alamat_dsn' => $alamat_dsn,
			'id_jrsn' => $id_jrsn,
			'nip_dsn' => $nip_dsn,
			'jbtn_dsn' => $jbtn_dsn,
			);

		$this->model->Simpan('tbl_dsn', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('dosen/index');

	}

	function editdsn($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetDsn("where id_dsn = '$kode'")->result_array();

		$data = array(
            'id_dsn' => $row[0]['id_dsn'],
			'kode_dsn' => $row[0]['kode_dsn'],
			'nama_dsn' => $row[0]['nama_dsn'],
			'email_dsn' => $row[0]['email_dsn'],
			'nohp_dsn' => $row[0]['nohp_dsn'],
			'alamat_dsn' => $row[0]['alamat_dsn'],
			'nip_dsn' => $row[0]['nip_dsn'],
			'id_jrsn' => $row[0]['id_jrsn'],
			'jbtn_dsn' => $row[0]['jbtn_dsn'],
		);

		$this->load->view('admin/dosen/editdsn', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatedsn(){

		$data = array(
            'id_dsn' => $this->input->post('id_dsn'),
			'kode_dsn' => $this->input->post('kode_dsn'),
			'nama_dsn' => $this->input->post('nama_dsn'),
			'email_dsn' => $this->input->post('email_dsn'),
			'nohp_dsn' => $this->input->post('nohp_dsn'),
			'alamat_dsn' => $this->input->post('alamat_dsn'),
			'nip_dsn' => $this->input->post('nip_dsn'),
			'id_jrsn' => $this->input->post('id_jrsn'),
			'jbtn_dsn' => $this->input->post('jbtn_dsn'),
			);

		$res = $this->model->updatedsn($data);
		if($res=1){
			header('location:'.base_url().'dosen/index');
		}else{
			header('location:'.base_url().'dosen/0');
		}
	}

	function hapusdsn($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_dsn',array('id_dsn' => $kode));
		if($result == 1){
			header('location:'.base_url().'dosen/index');
		}else{
			header('location:'.base_url().'dosen/0');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	
}