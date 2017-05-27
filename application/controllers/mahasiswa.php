<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
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
			'mhs' => $this->model->Getmhs('where tbl_mhs.id_jrsn = "'.$this->session->userdata('id_jrsn').'" order by id_mhs desc')->result_array(),
		);
		$this->load->view('admin/mahasiswa/index', $data1);
	}
	
	function inputmhs(){
		$this->load->view('admin/mahasiswa/inputmhs');
	}
	

	function simpanmhs(){
		
		$id_mhs = '';
		$id_jrsn = $_POST['id_jrsn'];
        $nrp_mhs = $_POST['nrp_mhs'];
		$nama_mhs = $_POST['nama_mhs'];
		$email_mhs = $_POST['email_mhs'];
		$alamat_mhs = $_POST['alamat_mhs'];
		$nohp_mhs = $_POST['nohp_mhs'];
		$ortu_mhs = $_POST['ortu_mhs'];
		
		

		$data = array(	
            'id_mhs'=>$id_mhs,
			'id_jrsn'=>$id_jrsn,
			'nrp_mhs'=> $nrp_mhs,
			'nama_mhs' => $nama_mhs,
			'email_mhs' => $email_mhs,
			'alamat_mhs' => $alamat_mhs,
			'nohp_mhs' => $nohp_mhs,
			'ortu_mhs' => $ortu_mhs,
			);

		$this->model->Simpan('tbl_mhs', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('mahasiswa/index');

	}

	function editmhs($kode = 0){
		$row = $this->model->GetMhs("where id_mhs = '$kode'")->result_array();

		$data = array(
            'id_mhs' => $row[0]['id_mhs'],
			'id_jrsn' => $row[0]['id_jrsn'],
			'nrp_mhs' => $row[0]['nrp_mhs'],
			'nama_mhs' => $row[0]['nama_mhs'],
			'email_mhs' => $row[0]['email_mhs'],
			'alamat_mhs' => $row[0]['alamat_mhs'],
			'nohp_mhs' => $row[0]['nohp_mhs'],
			'ortu_mhs' => $row[0]['ortu_mhs'],
			
		);

		$this->load->view('admin/mahasiswa/editmhs', $data);
	}

	function updatemhs(){

		$data = array(
            'id_mhs' => $this->input->post('id_mhs'),
			'id_jrsn' => $this->input->post('id_jrsn'),
			'nrp_mhs' => $this->input->post('nrp_mhs'),
			'nama_mhs' => $this->input->post('nama_mhs'),
			'email_mhs' => $this->input->post('email_mhs'),
			'alamat_mhs' => $this->input->post('alamat_mhs'),
			'nohp_mhs' => $this->input->post('nohp_mhs'),
			'ortu_mhs' => $this->input->post('ortu_mhs'),
			);

		$res = $this->model->updatemtk($data);
		if($res=1){
			header('location:'.base_url().'mahasiswa/index');
		}else{
			header('location:'.base_url().'mahasiswa/0');
		}
	}

	function hapusmhs($kode = 0){
		$result = $this->model->Hapus('tbl_mhs',array('id_mhs' => $kode));
		if($result == 1){
			header('location:'.base_url().'mahasiswa/index');
		}else{
			header('location:'.base_url().'mahasiswa/0');
		}
	}

	public function cetakktp()
	{
		header('Content-type: application/vnd.ms-excel');
		header('Content-disposition: attachment; filename="ktp.xls"');

		$this->load->view('admin/printktp');
	}
}