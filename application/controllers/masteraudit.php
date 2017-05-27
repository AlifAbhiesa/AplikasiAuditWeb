<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masteraudit extends CI_Controller {
	
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
			'master_audit' => $this->model->Getmaster_audit('where id_jadwal = "'.$this->session->userdata('id_jadwal').'" order by id_master desc')->result_array(),
		);
		
		$this->load->view('admin/master_audit/index', $data1);
	}
	
	function inputmaster_audit(){
		if($this->session->userdata('admin') == 1){
		$this->load->view('admin/master_audit/inputmaster_audit');
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	
	function simpanmaster_audit(){
		$row = $this->model->Getmaster_audit("where id_master = '$kode'")->result_array();

		
		$id_master = $_POST['id_master'];
		$kode_indikator = $_POST['kode_indikator'];
		$hasil_genap = $_POST['hasil_genap'];
		$target_genap = $_POST['target_genap'];
		$capaian_genap = $_POST['capaian_genap'];
		$rencana_kegiatan = $_POST['rencana_kegiatan'];
		$id_jadwal = $this->session->userdata('id_jadwal');
		
		$data = array(	
			'id_master'=> $id_master,
			'kode_indikator' => $kode_indikator,
			'hasil_genap' => $hasil_genap,
			'target_genap' => $target_genap,
			'capaian_genap' => $capaian_genap,
			'rencana_kegiatan' => $rencana_kegiatan,
			'id_jadwal' => $id_jadwal,
			
			);
		
		$this->model->Simpan('tbl_master_audit', $data);
if($capaian_genap >= 85){
		$nilai = 4;
}else if(($capaian_genap < 85) && ($capaian_genap >= 75)){
		$nilai = 3;
}else if(($capaian_genap < 75) && ($capaian_genap >= 65)){
		$nilai = 2;
}else if(($capaian_genap < 65) && ($capaian_genap >= 55)){
		$nilai = 1;
}else if($capaian_genap < 55){
		$nilai = 0;
}

$q = mysql_query("select bobot from tbl_indikator,tbl_master_audit where tbl_indikator.kode_indikator = tbl_master_audit.kode_indikator and tbl_indikator.kode_indikator = '".$kode_indikator."' and tbl_master_audit.id_jadwal = '".$id_jadwal."'");
$result = mysql_fetch_assoc($q);
		
$bobot_nilai = (($result["bobot"]/100)*$nilai);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		$this->db->query("CALL insert_nilai('".$id_master."', '$nilai', '$bobot_nilai')");
		redirect('/masteraudit/index');

	}

	function editmaster_audit($kode = 0){
		
		if($this->session->userdata('admin') == 1){
		$row = $this->model->Getmaster_audit("where id_master = '$kode'")->result_array();

		$data = array(
		
			'id_master' => $row[0]['id_master'],
			'kode_indikator' => $row[0]['kode_indikator'],
			'hasil_genap' => $row[0]['hasil_genap'],
			'target_genap' => $row[0]['target_genap'],
			'capaian_genap' => $row[0]['capaian_genap'],
			'rencana_kegiatan' => $row[0]['rencana_kegiatan'],
			'id_jadwal' => $row[0]['id_jadwal'],
			
			);

		$this->load->view('admin/master_audit/editmaster_audit', $data);
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}

	function updatemaster_audit(){

		$data = array(
			'id_master' => $this->input->post('id_master'),
			'kode_indikator' => $this->input->post('kode_indikator'),
			'hasil_genap' => $this->input->post('hasil_genap'),
			'target_genap' => $this->input->post('target_genap'),
			'capaian_genap' => $this->input->post('capaian_genap'),
			'rencana_kegiatan' => $this->input->post('rencana_kegiatan'),
			'id_jadwal' => $this->input->post('id_jadwal'),
			
			);

		$res = $this->model->Updatemaster_audit($data);
if($data['capaian_genap'] >= 85){
		$nilai = 4;
}else if(($data['capaian_genap'] < 85) && ($data['capaian_genap'] >= 75)){
		$nilai = 3;
}else if(($data['capaian_genap'] < 75) && ($data['capaian_genap'] >= 65)){
		$nilai = 2;
}else if(($data['capaian_genap'] < 65) && ($data['capaian_genap'] >= 55)){
		$nilai = 1;
}else if($data['capaian_genap'] < 55){
		$nilai = 0;
}

$q = mysql_query("select bobot from tbl_indikator,tbl_master_audit where tbl_indikator.kode_indikator = tbl_master_audit.kode_indikator and tbl_indikator.kode_indikator = '".$data['kode_indikator']."' and tbl_master_audit.id_jadwal = '".$data['id_jadwal']."'");
$result = mysql_fetch_assoc($q);
		
$bobot_nilai = (($result["bobot"]/100)*$nilai);

$this->db->query("CALL update_nilai('$nilai','$bobot_nilai','".$data['id_master']."')");
		if($res=1){
			header('location:'.base_url().'masteraudit/index');
		}else{
			header('location:'.base_url().'masteraudit/index/0');
		}
		
	}

	function hapusmaster_audit($kode = 0){
		if($this->session->userdata('admin') == 1){
		$result = $this->model->Hapus('tbl_master_audit',array('id_master' => $kode));
		if($result == 1){
			header('location:'.base_url().'masteraudit/index');
		}else{
			header('location:'.base_url().'masteraudit/index');
		}
		}else{
		echo '<script type="text/javascript">alert("HANYADAPAT DILAKUAN ADMIN")</script>';	
		$this->index();
	}
	}
	

}