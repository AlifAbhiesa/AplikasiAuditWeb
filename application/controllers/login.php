<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function index(){
		if ($this->session->userdata('admin') OR $this->session->userdata('user')) {
			redirect(base_url().'home');
		}
		else{
			$db='m_login';
			$sub_data['info']=$this->session->userdata('info');
			if ($this->input->post('login')) {
				$this->form_validation->set_rules('nama_user','Nama Pengguna','trim|required|max_length[20]|xss_clean');
                $this->form_validation->set_rules('pass_user','Password','trim|required|max_length[20]|xss_clean');
                $this->form_validation->set_error_delimiters('<div class="warning-valid">','</div>');    
                if($this->form_validation->run()==TRUE){
                    $this->$db->proses_login();
                }
			}
			$this->load->view('v_login', $sub_data);

			$this->session->unset_userdata('info');
      
		}
	}
	function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    function register(){
    	$this->load->view('v_register');
    }
}
