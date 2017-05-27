<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kesimpulan extends CI_Controller {
	
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
			'ksmpln' => $this->model->Getkesimpulan('where tbl_kesimpulan.id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_kesimpulan desc')->result_array(),
		);
		
		$this->load->view('admin/kesimpulan/index', $data1);
	}
	
	function inputkesimpulan(){
		 
		$this->load->view('admin/kesimpulan/inputkesimpulan');
		 
	}

	function simpankesimpulan(){
		

		
		$id_kesimpulan = '';
		$uraian = $_POST['uraian'];
		$keterangan = $_POST['keterangan'];
		$id_jadwal = $this->session->userdata('id_jadwal');

		$data = array(	
			'id_kesimpulan'=> $id_kesimpulan,
			'uraian' => $uraian,
			'keterangan' => $keterangan,
'id_jadwal' => $id_jadwal,

			);

		$this->model->Simpan('tbl_kesimpulan', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('/kesimpulan/index');

	}

	function editkesimpulan($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->Getkesimpulan("where id_kesimpulan = '$kode'")->result_array();

		$data = array(
		
			'id_kesimpulan' => $row[0]['id_kesimpulan'],
			'uraian' => $row[0]['uraian'],
			'keterangan' => $row[0]['keterangan'],
'id_jadwal' => $row[0]['id_jadwal'],
			
			
			);

		$this->load->view('admin/kesimpulan/editkesimpulan', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatekesimpulan(){

		$data = array(
			'id_kesimpulan' => $this->input->post('id_kesimpulan'),
			'uraian' => $this->input->post('uraian'),
			'keterangan' => $this->input->post('keterangan'),
'id_jadwal' => $this->input->post('id_jadwal'),
			
			);

		$res = $this->model->Updatekesimpulan($data);
		if($res=1){
			header('location:'.base_url().'kesimpulan/index');
		}else{
			header('location:'.base_url().'kesimpulan/index/0');
		}
	}

	function hapuskesimpulan($kode = 0){
		
		$result = $this->model->Hapus('tbl_kesimpulan',array('id_kesimpulan' => $kode));
		if($result == 1){
			header('location:'.base_url().'kesimpulan/index');
		}else{
			header('location:'.base_url().'kesimpulan/index');
		}
		
		$this->index();
	}
	}

	
