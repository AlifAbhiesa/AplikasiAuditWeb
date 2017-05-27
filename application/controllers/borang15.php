<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang15 extends CI_Controller {
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
		$id_jadwal = $this->session->userdata('id_jadwal');
		$data1 = array(
			'brng15' => $this->model->GetBrng15('where id_jadwal = "'.$id_jadwal.'" order by id_brng15 desc')->result_array(),
		);
		$this->load->view('admin/borang15/index', $data1);
	
	}
	
	function inputbrng15(){
		
	if($this->session->userdata('admin') == 1){ 
		$this->load->view('admin/borang15/inputbrng15');
	}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}
	

	function simpanbrng15(){
		
		$id_brng15 = '';
        $id_dsn = $_POST['id_dsn'];
		$hasil_kuesioner = $_POST['hasil_kuesioner'];
	    $id_jadwal = $this->session->userdata('id_jadwal');

		$data = array(	
            'id_brng15'=>$id_brng15,
			'id_dsn'=> $id_dsn,
			'hasil_kuesioner' => $hasil_kuesioner,
			'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng15', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('borang15/index');

	}

	function editbrng15($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$row = $this->model->GetBrng15("where id_brng15 = '$kode'")->result_array();

		$data = array(
            'id_brng15' => $row[0]['id_brng15'],
			'id_dsn' => $row[0]['id_dsn'],
			'hasil_kuesioner' => $row[0]['hasil_kuesioner'],
			'id_jadwal' => $row[0]['id_jadwal'],
			
			
		);

		$this->load->view('admin/borang15/editbrng15', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng15(){

		$data = array(
            'id_brng15' => $this->input->post('id_brng15'),
			'hasil_kuesioner' => $this->input->post('hasil_kuesioner'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			
			);

		$res = $this->model->updatebrng15($data);
		if($res=1){
			header('location:'.base_url().'borang15/index');
		}else{
			header('location:'.base_url().'borang15/0');
		}
	}

	function hapusbrng15($kode = 0){
		if($this->session->userdata('admin') == 1){ 
		$result = $this->model->Hapus('tbl_brng15',array('id_brng15' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang15/index');
		}else{
			header('location:'.base_url().'borang15/0');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	
}