<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Savejadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->save();
	}

	private function save()
	{
$id_jadwal = $_POST['id_jadwal'];

$q = mysql_query("select id_jrsn from tbl_jadwal where id_jadwal = '".$id_jadwal."'");
$result = mysql_result($q, 0);
	
$this->session->set_userdata('id_jrsn',$result);

		$this->session->set_userdata('id_jadwal',$id_jadwal);
redirect(base_url()."mahasiswa");
		
	}


}

/* End of file  */
/* Location: ./application/controllers/ */