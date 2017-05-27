<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prestasi extends CI_Controller {
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
			'pres' => $this->model->Getpres('order by id_pres desc')->result_array(),
		);
		$this->load->view('admin/prestasi/index', $data1);
	}
	
	function inputpres(){
		$this->load->view('admin/prestasi/inputpres');
	}
	

	function simpanpres(){
		
		$id_pres = '';
        $id_kegiatan = $_POST['id_kegiatan'];
		$nama_pres = $_POST['nama_pres'];
		
		$data = array(	
            'id_pres'=>$id_pres,
			'id_kegiatan'=> $id_kegiatan,
			'nama_pres' => $nama_pres,
			);

		$this->model->Simpan('tbl_prestasi', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('prestasi/index');

	}

	function editpres($kode = 0){
		$row = $this->model->Getpres("where id_pres = '$kode'")->result_array();

		$data = array(
            'id_pres' => $row[0]['id_pres'],
			'id_kegiatan' => $row[0]['id_kegiatan'],
			'nama_pres' => $row[0]['nama_pres'],
			
			
		);

		$this->load->view('admin/prestasi/editpres', $data);
	}

	function updatepres(){

		$data = array(
            'id_pres' => $this->input->post('id_pres'),
			'id_kegiatan' => $this->input->post('id_kegiatan'),
			'nama_pres' => $this->input->post('nama_pres'),
			
			);

		$res = $this->model->updatepres($data);
		if($res=1){
			header('location:'.base_url().'prestasi/index');
		}else{
			header('location:'.base_url().'prestasi/0');
		}
	}

	function hapuspres($kode = 0){
		$result = $this->model->Hapus('tbl_prestasi',array('id_pres' => $kode));
		if($result == 1){
			header('location:'.base_url().'prestasi/index');
		}else{
			header('location:'.base_url().'prestasi/0');
		}
	}

	public function cetakktp()
	{
		header('Content-type: application/vnd.ms-excel');
		header('Content-disposition: attachment; filename="ktp.xls"');

		$this->load->view('admin/printktp');
	}
}