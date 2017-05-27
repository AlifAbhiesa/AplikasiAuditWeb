<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang810 extends CI_Controller {
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
			'brng810' => $this->model->Getbrng810('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng810 desc')->result_array(),
		);
		$this->load->view('admin/borang810/index', $data1);
	}
	
	function inputbrng810(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/borang810/inputbrng810');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}
	

	function simpanbrng810(){
		
		$id_brng810 = '';
        $id_mtk = $_POST['id_mtk'];
		$awal = $_POST['awal'];
	    $tengah = $_POST['tengah'];
		$akhir = $_POST['akhir'];
$id_jadwal = $this->session->userdata('id_jadwal');

		$data = array(	
            'id_brng810'=>$id_brng810,
			'id_mtk'=> $id_mtk,
			'awal' => $awal,
			'tengah' => $tengah,
			'akhir' => $akhir,
			'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng810', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('borang810/index');

	}

	function editbrng810($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->GetBrng810("where id_brng810 = '$kode'")->result_array();

		$data = array(
            'id_brng810' => $row[0]['id_brng810'],
			'id_mtk' => $row[0]['id_mtk'],
			'awal' => $row[0]['awal'],
			'tengah' => $row[0]['tengah'],
			'akhir' => $row[0]['akhir'],
'id_jadwal' => $row[0]['id_jadwal'],
			
		);

		$this->load->view('admin/borang810/editbrng810', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng810(){

		$data = array(
            'id_brng810' => $this->input->post('id_brng810'),
			
			'awal' => $this->input->post('awal'),
			'tengah' => $this->input->post('tengah'),
			'akhir' => $this->input->post('akhir'),
'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->updatebrng810($data);
		if($res=1){
			header('location:'.base_url().'borang810/index');
		}else{
			header('location:'.base_url().'borang810/0');
		}
	}

	function hapusbrng810($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_brng810',array('id_brng810' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang810/index');
		}else{
			header('location:'.base_url().'borang810/0');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}