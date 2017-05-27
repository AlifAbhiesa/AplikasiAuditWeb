<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurusan extends CI_Controller {
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
			'jrsn' => $this->model->GetJrsn('order by tbl_jrsn.id_jrsn desc')->result_array(),
		);
		$this->load->view('admin/jurusan/index', $data1);
	}
	
	function inputjrsn(){
		
		if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/jurusan/inputjrsn');
		
}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}
	

	function simpanjrsn(){
		
		$id_jrsn = '';
        
		$fakultas = $_POST['fakultas'];
		$nama_jrsn = $_POST['nama_jrsn'];
		$email_jrsn = $_POST['email_jrsn'];
		
		

		$data = array(	
            'id_jrsn'=>$id_jrsn,
			'fakultas' => $fakultas,
			'nama_jrsn' => $nama_jrsn,
			'email_jrsn' => $email_jrsn,
			
			);

		$this->model->Simpan('tbl_jrsn', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('jurusan/index');

	}

	function editjrsn($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->GetJrsn("where tbl_jrsn.id_jrsn = '$kode'")->result_array();

		$data = array(
            'id_jrsn' => $row[0]['id_jrsn'],
			
			'fakultas' => $row[0]['fakultas'],
			'nama_jrsn' => $row[0]['nama_jrsn'],
			'email_jrsn' => $row[0]['email_jrsn'],
			
			
		);

		$this->load->view('admin/jurusan/editjrsn', $data);
		
}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatejrsn(){

		$data = array(
                        'id_jrsn' => $this->input->post('id_jrsn'),
			
			'fakultas' => $this->input->post('fakultas'),
			'nama_jrsn' => $this->input->post('nama_jrsn'),
			'email_jrsn' => $this->input->post('email_jrsn'),
			
			);

		$res = $this->model->updateJrsn($data);
		if($res=1){
			header('location:'.base_url().'jurusan/index');
		}else{
			header('location:'.base_url().'jurusan/0');
		}
	}

	function hapusjrsn($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_jrsn',array('id_jrsn' => $kode));
		if($result == 1){
			header('location:'.base_url().'jurusan/index');
		}else{
			header('location:'.base_url().'jurusan/0');
		}
		
}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	
}