<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {	

	public function __construct()
	{
		parent::__construct();
		
	}
	function proses_login(){
		
        //set variabel
		$nama_user = $this->input->post('nama_user');
		$pass_user=($_POST['pass_user']);
		
        //ambil database
		$query = $this->db->query("Select * from tb_login Where nama_user = '$nama_user' and pass_user = '$pass_user'");
		if ($query->num_rows() > 0){
			
			$row = $query->row();
			$id_user = $row->id_user;
			$pass_user = $row->pass_user;
			$level=$row->level;
			$status=$row->status;
			
			if ($pass_user==$pass_user){
                //ambil nama
				$q="SELECT * FROM tb_login where id_user='".$id_user."'";
				$bidang=$this->db->query($q)->row();
				$c='";s:1:"';
				$sql="SELECT * FROM ci_sessions WHERE user_data LIKE '%id_user".$c.$id_user."%'";
				$cek=$this->db->query($sql)->num_rows();
				// if($cek==0){

					$this->session->set_userdata('id_user',$id_user);
					if($level==1){

						$this->session->set_userdata('admin',$id_user);
						$this->session->set_userdata('nama',$nama_user);
						redirect(base_url()."mahasiswa");
					}else{

						$this->session->set_userdata('admin',$id_user);
						$this->session->set_userdata('nama',$nama_user);
						redirect(base_url()."mahasiswa");
					}
			}
			
			else{
				$info='<div class="warning-valid">Maaf Akun Anda Belum di Verivikasi Admin</div>';
				$this->session->set_userdata('info',$info);

				redirect(base_url().'login');
			}
		}
		else{
			$info='<div class="warning-valid">Ulangi terjadi kesalahan</div>';
			$this->session->set_userdata('info',$info);

			redirect(base_url().'login');
		}       
	}
}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */