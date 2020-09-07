<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_informasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_informasi','informasi');
		$this->load->model('m_perencanaan','perencanaan');
		$this->load->model('m_pencapaian','pencapaian');
		$this->load->model('m_user','user');
	}
	
	public function index()
	{
		$this->load->view('sidebar_dosen');
		$this->load->view('top_nav_dosen');
		$this->load->view('dosen/v_informasi');
		$this->load->view('footer_dosen');
	}

	public function tambah()
	{
		$data2['notif']=$this->perencanaan->getNotif();

		$this->load->view('ketuakk/sidebar_ketuakk');
		$this->load->view('ketuakk/top_nav_ketuakk',$data2);
		$this->load->view('ketuakk/vc_informasi');
		$this->load->view('ketuakk/footer_ketuakk');
	}

	public function tambahInfo()
	{
		$id_dosen=$this->session->userdata('id_dosen');
		$data2['notif']=$this->pencapaian->get_notif($id_dosen);
		$this->load->view('sidebar_dosen');
		$this->load->view('top_nav_dosen',$data2);
		$this->load->view('dosen/vc_informasi');
		$this->load->view('footer_dosen');
	}


	public function addInformasi(){
			$username = $this->input->post('username');
			$jenis = $this->input->post('jenis');
			$judul = $this->input->post('judul');
			$link = $this->input->post('link');
			//$poster = $this->input->post('poster');

			$config['upload_path'] = './assets/images/informasi/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$image=$this->load->library('upload', $config);

			if ($this->upload->do_upload('poster')){
				$img = array($this->upload->data());
				$poster = $img[0]['file_name'];
				
			}else{
				$poster = "no pict";
				
			}

			$hasil=$this->user->get_data_by_uname_pengelola($username);

			$this->informasi->insertInformasi($jenis, $judul, $link, $poster,$hasil['id_pengelola']);
			redirect('c_sidebarketuakk?menu=informasi','refresh');
	}

	public function addInformasiDosen(){
			$username = $this->input->post('username');
			$jenis = $this->input->post('jenis');
			$judul = $this->input->post('judul');
			$link = $this->input->post('link');
			//$poster = $this->input->post('poster');

			$config['upload_path'] = './assets/images/informasi/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$image=$this->load->library('upload', $config);

			if ($this->upload->do_upload('poster')){
				$img = array($this->upload->data());
				$poster = $img[0]['file_name'];
				
			}else{
				$poster = "no pict";
				
			}

			$hasil=$this->user->get_data_by_uname_dosen($username);

			$this->informasi->insertInformasi($jenis, $judul, $link, $poster,$hasil['id_dosen']);
			redirect('c_sidebardosen?menu=informasi','refresh');
	}

	public function tampilInformasi(){
			$data2['notif']=$this->perencanaan->getNotif();
			$data['informasi']=$this->informasi->get_all_data();
			$this->load->view('ketuakk/sidebar_ketuakk');
			$this->load->view('ketuakk/top_nav_ketuakk',$data2);
			$this->load->view('ketuakk/v_informasi',$data);
			$this->load->view('ketuakk/footer_ketuakk');
	}

	public function tampilInformasiDosen(){
			$id_dosen=$this->session->userdata('id_dosen');
			$data['informasi']=$this->informasi->get_all_data();
			$data2['notif']=$this->pencapaian->get_notif($id_dosen);
			$this->load->view('sidebar_dosen');
			$this->load->view('top_nav_dosen',$data2);
			$this->load->view('dosen/v_informasi',$data);
			$this->load->view('footer_dosen');
	}

	public function ubahInformasi(){
			$id_dosen = $this->session->userdata('id_dosen');
			$id_pengelola = $this->session->userdata('id_pengelola');
			$id_informasi = $this->input->post('id_informasi');
			$jenis = $this->input->post('jenis');
			$judul = $this->input->post('judul');
			$link = $this->input->post('link');
			//$poster = $this->input->post('poster');

			$config['upload_path'] = './assets/images/informasi/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$image=$this->load->library('upload', $config);

			if (!$this->upload->do_upload('poster')){
				$data = array(
					'jenis' => $jenis,
					'judul' => $judul,
					'link' => $link
				);

				//$error = $this->upload->display_errors();
	            // menampilkan pesan error
	            //print_r($error);
			}else{
				$img = array($this->upload->data());
				if ($img[0]['file_name']==""){
					$data = array(
						'jenis' => $jenis,
						'judul' => $judul,
						'link' => $link
					);
					//echo '2';
				}else{
					$poster=$img[0]['file_name'];
					$data = array(
						'jenis' => $jenis,
						'judul' => $judul,
						'link' => $link,
						'poster' => $poster
					);
					//echo '3';
				}
			}
			
			$this->informasi->updateInformasi($id_informasi, $data);
			redirect('c_sidebarketuakk?menu=informasi','refresh');
	}

	public function ubahInformasiDosen(){
			$id_dosen = $this->session->userdata('id_dosen');
			$id_pengelola = $this->session->userdata('id_pengelola');
			$id_informasi = $this->input->post('id_informasi');
			$jenis = $this->input->post('jenis');
			$judul = $this->input->post('judul');
			$link = $this->input->post('link');
			//$poster = $this->input->post('poster');

			$config['upload_path'] = './assets/images/informasi/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$image=$this->load->library('upload', $config);

			if (!$this->upload->do_upload('poster')){
				$data = array(
					'jenis' => $jenis,
					'judul' => $judul,
					'link' => $link
				);

				//$error = $this->upload->display_errors();
	            // menampilkan pesan error
	            //print_r($error);
			}else{
				$img = array($this->upload->data());
				if ($img[0]['file_name']==""){
					$data = array(
						'jenis' => $jenis,
						'judul' => $judul,
						'link' => $link
					);
					//echo '2';
				}else{
					$poster=$img[0]['file_name'];
					$data = array(
						'jenis' => $jenis,
						'judul' => $judul,
						'link' => $link,
						'poster' => $poster
					);
					//echo '3';
				}
			}
			
			$this->informasi->updateInformasi($id_informasi, $data);
			redirect('c_sidebardosen?menu=informasi','refresh');
	}

	public function hapusInformasiDosen($informasi)
	{
		$this->informasi->delInformasi($informasi);
		redirect('c_informasi/tampilInformasiDosen','refresh');
	}

	public function hapusInformasiKetua($informasi)
	{
		$this->informasi->delInformasi($informasi);
		redirect('c_informasi/tampilInformasi','refresh');
	}

	public function vkonfHapus()
	{
		$informasi=$this->input->post('rowid');
		
		echo'
			  <div class="modal-body">
			  	Apakah anda yakin akan menghapus informasi '.$informasi.'?
			  </div>
			  <div class="modal-footer">
			  	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			  	<a href="'.base_url().'c_informasi/hapusInformasiDosen/'.$informasi.'" class="btn btn-danger">Ya</a>
			  </div>
		';
	}

	public function vkonfHapusInfo()
	{
		$informasi=$this->input->post('rowid');
		
		echo'
			  <div class="modal-body">
			  	Apakah anda yakin akan menghapus informasi '.$informasi.'?
			  </div>
			  <div class="modal-footer">
			  	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			  	<a href="'.base_url().'c_informasi/hapusInformasiKetua/'.$informasi.'" class="btn btn-danger">Ya</a>
			  </div>
		';
	}

	
}