<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','user');
		$this->load->model('m_kelompokkeahlian','kk');
		$this->load->model('m_perencanaan','perencanaan');
	}
	
	public function index()
	{
		$this->load->view('dosen/v_register');
	}

	public function tambahKetua()
	{
		$this->load->view('wadek/sidebar_wadek');
		$this->load->view('wadek/top_nav_wadek');
		$this->load->view('wadek/vc_ketuakk');
		$this->load->view('wadek/footer_wadek');
	}

	/*public function v_profile()
	{
		$data['data_user']=$this->user->get_profil_dosen();
		$this->load->view('sidebar_dosen');
		$this->load->view('top_nav_dosen');
		$this->load->view('dosen/vr_profile',$data);
		$this->load->view('footer_dosen');
	}*/

	public function addPengguna()
	{
		$this->form_validation->set_rules('nip','NIP','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('username','Nama Pengguna','trim|required|is_unique[dosen.username]');
		$this->form_validation->set_rules('password','Kata Sandi','required|md5');
		$this->form_validation->set_rules('cpassword','Konfirmasi Kata Sandi','required|md5|matches[password]');
		$this->form_validation->set_rules('no_telp','No. Telepon','required|numeric|max_length[14]|min_length[10]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[dosen.email]');

		// $data = array(
		// 	$nip = $this->input->post('nip'),
		// 	$nama = $this->input->post('nama'),
		// 	$no_telp = $this->input->post('no_telp'),
		// 	$email = $this->input->post('email')
		// );

		// $this->session->set_userdata($data);

		if($this->form_validation->run() == FALSE){
			//$this->index();
			$this->load->view('dosen/v_register');
		}else{
			$dosen = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'status' => 'Tidak Aktif'
			);

			// $this->session->unset_userdata('nip','nama','email','no_telp');
			if ($this->user->add_dosen($dosen)){
				$nama= $this->input->post('nama');
				if($this->send_mail($this->input->post('email'),$nama)){
					$this->session->set_flashdata('msg','Data Berhasil Ditambahkan! Silahkan Cek Email Anda.');
					redirect('c_login','refresh');
				}else{
					// $this->session->set_flashdata('msg','
     //        <div class="alert alert-danger">Gagal Kirim Email!</div>');
					// redirect('c_register','refresh');
					echo $this->email->print_debugger();
				}
			}else{
				$this->session->set_flashdata('msg','
            <div class="alert alert-danger">Gagal Registrasi!</div>');
				redirect('c_register','refresh');
			}	
		}
	}

	public function send_mail($email, $nama)
	{
		$from_email= "kelompokkeahlianfit@gmail.com";
		$subject= "Verify Your Email Address";
		$message= 'Untuk Mr./Mrs. '. $nama . ',<br /><br/ >
				   Please click on the below activation link to verify your email address. <br /><br/>
				   http://localhost/imon/verify/' . md5($email) . '<br/><br/><br/>
				   Thanks<br/>
				   <b>Yustisia Susandi</b>';

		$config['protocol']='smtp';
		$config['smtp_host']='ssl://smtp.gmail.com';
		$config['smtp_timeout']='7';
		$config['smtp_port']='465';
		$config['smtp_user']=$from_email;
		$config['smtp_pass']='telkom123';
		$config['mailtype']='html';
		$config['charset']='iso-8859-1';
		$config['wordwrap']=TRUE;
		$config['newline']="\r\n";
		$config['crlf']="\r\n";
		$this->email->initialize($config);

		$this->email->from($from_email, 'ImOn');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);

		return $this->email->send(FALSE);
	}

	public function verify($hash=NULL)
	{
		if ($this->user->verify($hash)){
			$this->session->set_flashdata('msg', 'Email Sukses');
			redirect('c_login','refresh');
		}else{
			$this->session->set_flashdata('msg', 'Email Gagal');
			redirect('c_login','refresh');
		}
	}

	public function ubahDosen()
	{		
		$id_dosen = $this->session->userdata('id_dosen');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		//$foto = $this->input->post('foto');
		$id_kk = $this->input->post('namaKK');

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$image=$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')){
			$dosen = array(
				'nip' => $nip,
				'nama' => $nama,
				'password' => $password,
				'no_telp' => $no_telp,
				'email' => $email,
				'id_kk' => $id_kk
			);
			$this->session->set_userdata('nama',$nama);

			//$error = $this->upload->display_errors();
            // menampilkan pesan error
            //print_r($error);
		}else{
			$img = array($this->upload->data());
			if ($img[0]['file_name']==""){
				$dosen = array(
					'nip' => $nip,
					'nama' => $nama,
					'password' => $password,
					'no_telp' => $no_telp,
					'email' => $email,
					'id_kk' => $id_kk

				);
				$this->session->set_userdata('nama',$nama);
				//echo '2';
			}else{
				$foto=$img[0]['file_name'];
				$dosen = array(
					'nip' => $nip,
					'nama' => $nama,
					'password' => $password,
					'no_telp' => $no_telp,
					'email' => $email,
					'foto' => $foto,
					'id_kk' => $id_kk

				);
				$this->session->set_userdata('nama',$nama);
				$this->session->set_userdata('foto',$foto);
				//echo '3';
			}
		}
			

		$this->user->update_dosen($id_dosen, $dosen);
		redirect('c_sidebardosen');
	}

	public function ubahPengelola()
	{		
		$id_pengelola = $this->session->userdata('id_pengelola');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		//$foto = $this->input->post('foto');
		$id_kk = $this->input->post('namaKK');

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$image=$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')){
			$pengelola = array(
				'nip' => $nip,
				'nama' => $nama,
				'password' => $password,
				'no_telp' => $no_telp,
				'email' => $email,
				'id_kk' => $id_kk
			);
			$this->session->set_userdata('nama',$nama);

			//$error = $this->upload->display_errors();
            // menampilkan pesan error
            //print_r($error);
		}else{
			$img = array($this->upload->data());
			if ($img[0]['file_name']==""){
				$pengelola = array(
					'nip' => $nip,
					'nama' => $nama,
					'password' => $password,
					'no_telp' => $no_telp,
					'email' => $email,
					'id_kk' => $id_kk

				);
				$this->session->set_userdata('nama',$nama);
				//echo '2';
			}else{
				$foto=$img[0]['file_name'];
				$pengelola = array(
					'nip' => $nip,
					'nama' => $nama,
					'password' => $password,
					'no_telp' => $no_telp,
					'email' => $email,
					'foto' => $foto,
					'id_kk' => $id_kk

				);
				$this->session->set_userdata('nama',$nama);
				$this->session->set_userdata('foto',$foto);
				//echo '3';
			}
		}
			

		$this->user->update_pengelola($id_pengelola, $pengelola);
		redirect('c_sidebarketuakk');
	}

	public function ubahWadek()
	{		
		$id_pengelola = $this->session->userdata('id_pengelola');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		//$foto = $this->input->post('foto');
		$id_kk = $this->input->post('namaKK');

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$image=$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')){
			$pengelola = array(
				'nip' => $nip,
				'nama' => $nama,
				'password' => $password,
				'no_telp' => $no_telp,
				'email' => $email
			);
			$this->session->set_userdata('nama',$nama);

			//$error = $this->upload->display_errors();
            // menampilkan pesan error
            //print_r($error);
		}else{
			$img = array($this->upload->data());
			if ($img[0]['file_name']==""){
				$pengelola = array(
					'nip' => $nip,
					'nama' => $nama,
					'password' => $password,
					'no_telp' => $no_telp,
					'email' => $email

				);
				$this->session->set_userdata('nama',$nama);
				//echo '2';
			}else{
				$foto=$img[0]['file_name'];
				$pengelola = array(
					'nip' => $nip,
					'nama' => $nama,
					'password' => $password,
					'no_telp' => $no_telp,
					'email' => $email,
					'foto' => $foto

				);
				$this->session->set_userdata('nama',$nama);
				$this->session->set_userdata('foto',$foto);
				//echo '3';
			}
		}
			

		$this->user->update_pengelola($id_pengelola, $pengelola);
		redirect('c_sidebarwadek');
	}

	public function settingDosen()
	{
		$uname=$this->input->post('rowid');
		$profil=$this->user->get_dosen_uname($uname);
		$datakk=$this->kk->get_data_kk();
		echo'
			  <div class="form-group">
			  	<input type="hidden" name="id" value="'.$profil['id_dosen'].'">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$profil['foto'].'</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="file" class="form-control" name="foto" id="foto">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nip" value="'.$profil['nip'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nama" value="'.$profil['nama'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pengguna</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="username" value="'.$profil['username'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kata Sandi</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="password" class="form-control" name="password" value="'.$profil['password'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="email" value="'.$profil['email'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telepon</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="no_telp" value="'.$profil['no_telp'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelompok Keahlian</label>
                <div class="col-md-9 col-sm-9 col-xs-12" id="namaKK" >
                  <select class="form-control" name="namaKK">';
                      foreach ($datakk as $kk) {
                      	$sel="";
                      	if($profil['id_kk']==$kk['id_kk']){
                      		$sel="selected";
                      	}
                      	  echo '<option value="'.$kk['id_kk'].'" '.$sel.'>'.$kk['namaKK'].'</option>';
                      }
                      echo '
                  </select>
                </div>
              </div>';
		
	}

	public function settingPengelola()
	{
		$uname=$this->input->post('rowid');
		$profil=$this->user->get_pengelola_uname($uname);
		$datakk=$this->kk->get_data_kk();
		echo'
			  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$profil['foto'].'</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="file" class="form-control" name="foto" value="'.$profil['foto'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nip" value="'.$profil['nip'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nama" value="'.$profil['nama'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pengguna</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="username" value="'.$profil['username'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kata Sandi</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="password" class="form-control" name="password" value="'.$profil['password'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="email" value="'.$profil['email'].'">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telepon</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="no_telp" value="'.$profil['no_telp'].'">
                </div>
              </div>';
              if($profil['id_kk']==1){
              	  echo'<input type="hidden" class="form-control" name="id_kk" value="'.$profil['id_kk'].'">';
              }else{
	          	  echo '
	              <div class="form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelompok Keahlian</label>
	                <div class="col-md-9 col-sm-9 col-xs-12" id="namaKK" >
	                  <select class="form-control" name="namaKK">';
	                      foreach ($datakk as $kk) {
	                      	$sel="";
	                      	if($profil['id_kk']==$kk['id_kk']){
	                      		$sel="selected";
	                      	}
	                      	  echo '<option value="'.$kk['id_kk'].'" '.$sel.'>'.$kk['namaKK'].'</option>';
	                      }
	                      echo '
	                  </select>
	                </div>
	              </div>';
              }
             
	}

	public function tampilAnggotaKK()
	{
		$id_pengelola=$this->session->userdata('id_pengelola');
		$data['profil']=$this->user->get_kk_data_dosen($id_pengelola);

		$data2['notif']=$this->perencanaan->getNotif();

		$this->load->view('ketuakk/sidebar_ketuakk');
		$this->load->view('ketuakk/top_nav_ketuakk',$data2);
		$this->load->view('ketuakk/v_anggota',$data);
		$this->load->view('ketuakk/footer_ketuakk');
	}

	public function tampilAllDosen()
	{
		$data['dosen']=$this->user->get_all_dosen();

		$this->load->view('wadek/sidebar_wadek');
		$this->load->view('wadek/top_nav_wadek');
		$this->load->view('wadek/v_dosen',$data);
		$this->load->view('wadek/footer_wadek');
	}

	public function tampilAllKetua()
	{
		$data['ketuakk']=$this->user->get_all_ketua();

		$this->load->view('wadek/sidebar_wadek');
		$this->load->view('wadek/top_nav_wadek');
		$this->load->view('wadek/v_ketuakk',$data);
		$this->load->view('wadek/footer_wadek');
	}

	public function ubahStatus(){
		$id_dosen = $this->input->post('id_dosen');
		$status = $this->input->post('status');

		$data = array(
			'status' => $status
		);

		
		$this->user->updateStatus($id_dosen, $data);
		redirect('c_register/tampilAnggotaKK?menu=anggota','refresh');
	}

	public function addKetua()
	{
		/*$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$status = 'Aktif'*/;

		$ketua = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'status' => 'Aktif',
			'level' => 2
		);
		//print_r($ketua);


		$this->user->add_ketua($ketua);
		$this->session->set_flashdata('msg','Data Berhasil Disimpan!');
		redirect('c_sidebarwadek?menu=akunketuakk','refresh');
	}
}