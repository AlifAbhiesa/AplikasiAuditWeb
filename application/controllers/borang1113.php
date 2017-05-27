
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borang1113 extends CI_Controller {
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
			'brng1113' => $this->model->Getbrng1113('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_brng1113 desc')->result_array(),
		);
		$this->load->view('admin/borang1113/index', $data1);
	}
	
	function inputbrng1113(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/borang1113/inputbrng1113');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}
	

	function simpanbrng1113(){
		
		$id_brng810 = '';
        $id_mtk = $_POST['id_mtk'];
		$kelas = $_POST['kelas'];
	    $hdr_dsn = $_POST['hdr_dsn'];
		$hdr_mhsw = $_POST['hdr_mhsw'];
		$id_jurusan = $$this->session->userdata('jurusan');

		$data = array(	
            'id_brng1113'=>$id_brng1113,
			'id_mtk'=> $id_mtk,
			'kelas' => $kelas,
			'hdr_dsn' => $hdr_dsn,
			'hdr_mhsw' => $hdr_mhsw,
'id_jadwal' => $id_jadwal,
			);

		$this->model->Simpan('tbl_brng1113', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('borang1113/index');

	}

	function editbrng1113($kode = 0){
		if($this->session->userdata('admin') == 1){
		$row = $this->model->GetBrng1113("where id_brng1113 = '$kode'")->result_array();

		$data = array(
            'id_brng1113' => $row[0]['id_brng1113'],
			'id_mtk' => $row[0]['id_mtk'],
			'kelas' => $row[0]['kelas'],
			'hdr_dsn' => $row[0]['hdr_dsn'],
			'hdr_mhsw' => $row[0]['hdr_mhsw'],
			'id_jadwal' => $row[0]['id_jadwal'],
		);

		$this->load->view('admin/borang1113/editbrng1113', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatebrng1113(){

		$data = array(
            'id_brng1113' => $this->input->post('id_brng1113'),
			'kelas' => $this->input->post('kelas'),
			'hdr_dsn' => $this->input->post('hdr_dsn'),
			'hdr_mhsw' => $this->input->post('hdr_mhsw'),
'id_jadwal' => $this->input->post('id_jadwal'),
			);

		$res = $this->model->updatebrng1113($data);
		if($res=1){
			header('location:'.base_url().'borang1113/index');
		}else{
			header('location:'.base_url().'borang1113/0');
		}
	}

	function hapusbrng113($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_brng1113',array('id_brng1113' => $kode));
		if($result == 1){
			header('location:'.base_url().'borang1113/index');
		}else{
			header('location:'.base_url().'borang1113/0');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

}