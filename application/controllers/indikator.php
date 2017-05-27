<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indikator extends CI_Controller {
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
			'indikator' => $this->model->Getindikator('order by kode_indikator desc')->result_array(),
		);
		$this->load->view('admin/indikator/index', $data1);
	}
	
	function inputindikator(){
		$this->load->view('admin/indikator/inputindikator');
	}
	

	function simpanindikator(){
		
		
		$kode_indikator = $_POST['kode_indikator'];
        $indikator_audit = $_POST['indikator_audit'];
		$bobot = $_POST['bobot'];
		$nol = $_POST['nol'];
		$satu = $_POST['satu'];
		$dua = $_POST['dua'];
		$tiga = $_POST['tiga'];
		$empat = $_POST['empat'];
		$kode_indikator = $_POST['kode_indikator'];
		
		

		$data = array(	
            
			'kode_indikator'=>$kode_indikator,
			'indikator_audit'=> $indikator_audit,
			'bobot' => $bobot,
			'nol' => $nol,
			'satu' => $satu,
			'dua' => $dua,
			'tiga' => $tiga,
			'empat' => $empat,
			'kode_indikator' => $kode_indikator,
			);

		$this->model->Simpan('tbl_indikator', $data);
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'>            
			<strong>Operasi </strong>berhasil di lakukan
		</div>");
		redirect('indikator/index');

	}

	function editindikator($kode = 0){
		$row = $this->model->Getindikator("where kode_indikator = '$kode'")->result_array();

		$data = array(
            
			'kode_indikator' => $row[0]['kode_indikator'],
			'indikator_audit' => $row[0]['indikator_audit'],
			'bobot' => $row[0]['bobot'],
			'nol' => $row[0]['nol'],
			'satu' => $row[0]['satu'],
			'dua' => $row[0]['dua'],
			'tiga' => $row[0]['tiga'],
			'empat' => $row[0]['empat'],
			'kode_indikator' => $row[0]['kode_indikator'],			
		);

		$this->load->view('admin/indikator/editindikator', $data);
	}

	function updateindikator(){

		$data = array(
           
			'kode_indikator' => $this->input->post('kode_indikator'),
			'indikator_audit' => $this->input->post('indikator_audit'),
			'bobot' => $this->input->post('bobot'),
			'nol' => $this->input->post('nol'),
			'satu' => $this->input->post('satu'),
			'dua' => $this->input->post('dua'),
			'tiga' => $this->input->post('tiga'),
			'empat' => $this->input->post('empat'),
			'kode_indikator' => $this->input->post('kode_indikator'),
			);

		$res = $this->model->updateindikator($data);
		if($res=1){
			header('location:'.base_url().'indikator/index');
		}else{
			header('location:'.base_url().'indikator/0');
		}
	}

	function hapusindikator($kode = 0){
		$result = $this->model->Hapus('tbl_indikator',array('kode_indikator' => $kode));
		if($result == 1){
			header('location:'.base_url().'indikator/index');
		}else{
			header('location:'.base_url().'indikator/0');
		}
	}

}