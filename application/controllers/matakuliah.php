<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matakuliah extends CI_Controller {
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
			'mtk' => $this->model->Getmtk('where id_jrsn = "'.$this->session->userdata('id_jrsn').'" order by id_mtk desc')->result_array(),
		);
		$this->load->view('admin/matakuliah/index', $data1);
	}
	
	function inputmtk(){
		$this->load->view('admin/matakuliah/inputmtk');
	}
	

	function simpanmtk(){
		
		$id_mtk = $_POST['id_mtk'];
        $id_jrsn = $this->session->userdata('id_jrsn');
		$nama_mtk = $_POST['nama_mtk'];
		$sks_mtk = $_POST['sks_mtk'];
		

		$data = array(	
            'id_mtk'=>$id_mtk,
			'nama_mtk' => $nama_mtk,
			'sks_mtk' => $sks_mtk,
'id_jrsn' => $id_jrsn,
			);

		$this->model->Simpan('tbl_mtk', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('matakuliah/index');

	}

	function editmtk($kode = 0){
		$row = $this->model->GetMtk("where id_mtk = '$kode'")->result_array();

		$data = array(
            'id_mtk' => $row[0]['id_mtk'],	
			'nama_mtk' => $row[0]['nama_mtk'],
			'sks_mtk' => $row[0]['sks_mtk'],
			'id_jrsn' => $row[0]['id_jrsn'],
		);

		$this->load->view('admin/matakuliah/editmtk', $data);
	}

	function updatemtk(){

		$data = array(
            'id_mtk' => $this->input->post('id_mtk'),
			'nama_mtk' => $this->input->post('nama_mtk'),
			'sks_mtk' => $this->input->post('sks_mtk'),
'id_jrsn' => $this->input->post('id_jrsn'),
			);

		$res = $this->model->updatemtk($data);
		if($res=1){
			header('location:'.base_url().'matakuliah/index');
		}else{
			header('location:'.base_url().'matakuliah/0');
		}
	}

	function hapusmtk($kode = 0){
		$result = $this->model->Hapus('tbl_mtk',array('id_mtk' => $kode));
		if($result == 1){
			header('location:'.base_url().'matakuliah/index');
		}else{
			header('location:'.base_url().'matakuliah/0');
		}
	}

}