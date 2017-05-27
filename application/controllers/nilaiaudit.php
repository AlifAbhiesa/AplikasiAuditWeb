<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilaiaudit extends CI_Controller {
	
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
			'nilaiaudit' => $this->model->Getnilaiaudit('where bobot is not null and nilai is not null and bobot_nilai is not null and tbl_master_audit.id_jadwal = "'.$this->session->userdata('id_jadwal').'"')->result_array(),
		);

		$this->load->view('admin/nilaiaudit/index', $data1);
	}
	

}