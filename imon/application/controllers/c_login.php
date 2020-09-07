<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','login');
	}
	
	public function index()
	{
		$this->load->view('v_login');
	}
	
	/*public function lupaPassword()
	{
		$this->load->view('v_lupaPassword');
	}*/

	public function login_proses()
	{
		if ($this->input->post('btnMasuk') == 'Masuk')
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Coba Lagi</div>');
					redirect('c_login');
			} else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				//print_r($this->login->cek_username_dosen($username)); exit();
				//print_r($username); exit();
				if ($this->login->cek_username_pengelola($username,$password)== TRUE){
					$hasil=$this->login->get_data_by_uname_pengelola($username);
						switch ($hasil['level']) {
							case 1:
								$jabatan='Wakil Dekan II';
								break;
							
							case 2:
								$jabatan='Ketua Kelompok Keahlian';
								break;
						}
						$this->session->set_userdata('id_pengelola',$hasil['id_pengelola']);
						$this->session->set_userdata('username',$username);
						$this->session->set_userdata('nama', $hasil['nama']);
						$this->session->set_userdata('foto', $hasil['foto']);
						$this->session->set_userdata('nip', $hasil['nip']);
						$this->session->set_userdata('jabatan', $jabatan);
						$this->session->set_userdata('level', $hasil['level']);
						$this->session->set_userdata('isLogin', TRUE);
						
						switch ($hasil['level']) {
							case 1:
								redirect('c_sidebarwadek','refresh');
								break;
							case 2:
								redirect('c_sidebarketuakk','refresh');
								break;
						}
				} else if ($this->login->cek_username_dosen($username,$password)== TRUE){
					$hasil=$this->login->get_data_by_uname_dosen($username);

					$this->session->set_userdata('id_dosen',$hasil['id_dosen']);
					$this->session->set_userdata('username',$username);
					$this->session->set_userdata('nama', $hasil['nama']);
					$this->session->set_userdata('foto', $hasil['foto']);
					$this->session->set_userdata('nip', $hasil['nip']);
					$this->session->set_userdata('isLogin', TRUE);

					redirect('c_sidebardosen','refresh');
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Username atau Password Salah!!! Silahkan Cek Kembali!</div>');
					redirect('c_login');
				}
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('v_login');
	}
}