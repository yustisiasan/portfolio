<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_roadmap extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_roadmap','roadmap');
		$this->load->model('m_user','dosen');
		$this->load->model('m_perencanaan','perencanaan');
		$this->load->model('m_pencapaian','pencapaian');
	}
	
	public function index()
	{
		$this->load->view('sidebar_dosen');
		$this->load->view('top_nav_dosen');
		$this->load->view('dosen/vr_roadmap');
		$this->load->view('footer_dosen');
	}

	public function tambah($id_roadmap)
	{
		$data['roadmap']=$this->roadmap->get_roadmap_id($id_roadmap);
		$id_dosen=$this->session->userdata('id_dosen');
		$data2['notif']=$this->pencapaian->get_notif($id_dosen);
		$this->load->view('sidebar_dosen');
		$this->load->view('top_nav_dosen',$data2);
		$this->load->view('dosen/vc_roadmap',$data);
		$this->load->view('footer_dosen');
	}

	public function addRoadmap(){
			//$username = $this->input->post('username');
			$id_dosen = $this->session->userdata('id_dosen');
			$penelitian_unggulan = $this->input->post('penelitian_unggulan');
			$bidang_penelitian = $this->input->post('bidang_penelitian');
			$produk = $this->input->post('produk');
			$alat = $this->input->post('alat');
			$tahun = $this->input->post('tahun');
			$kegiatan = $this->input->post('kegiatan');
			$sub_bidang = $this->input->post('sub_bidang');
			$luaran = $this->input->post('luaran');
			$target_hibah = $this->input->post('target_hibah');
			$judul = $this->input->post('judul');

			//$hasil=$this->dosen->get_data_by_uname_dosen($username);
			$data= array(
					'penelitian_unggulan' => $penelitian_unggulan,
					'bidang_penelitian' => $bidang_penelitian,
					'produk' => $produk,
					'alat' => $alat,
					'tahun' => $tahun,
					'kegiatan' => $kegiatan,
					'sub_bidang' => $sub_bidang,
					'luaran' => $luaran,
					'target_hibah' => $target_hibah,
					'judul' => $judul,
					'id_dosen' => $id_dosen

				);
			//print_r($data);
			$this->roadmap->insertRoadmap($data);
			redirect('c_sidebardosen?menu=roadmap','refresh');
	}

	public function tambahHead(){
			$id_dosen = $this->session->userdata('id_dosen');
			$penelitian_unggulan = $this->input->post('penelitian_unggulan');
			$bidang_penelitian = $this->input->post('bidang_penelitian');
			$produk = $this->input->post('produk');
			$alat = $this->input->post('alat');
			
			$this->roadmap->addHeadRoadmap($penelitian_unggulan, $bidang_penelitian, $produk, $alat, $id_dosen);
			redirect('c_sidebardosen?menu=roadmap','refresh');
	}

	public function ubahHead(){
			$id_dosen = $this->session->userdata('id_dosen');
			$id_roadmap = $this->input->post('id_roadmap');
			$penelitian_unggulan = $this->input->post('penelitian_unggulan');
			$bidang_penelitian = $this->input->post('bidang_penelitian');
			$produk = $this->input->post('produk');
			$alat = $this->input->post('alat');

			$data = array(
				'penelitian_unggulan' => $penelitian_unggulan,
				'bidang_penelitian' => $bidang_penelitian,
				'produk' => $produk,
				'alat'=> $alat
			);
 
			
			$this->roadmap->updateHead($id_roadmap, $data);
			redirect('c_sidebardosen?menu=roadmap','refresh');
	}

	public function ubahRoadmap(){
			$id_dosen = $this->session->userdata('id_dosen');
			$id_roadmap = $this->input->post('id_roadmap');
			$tahun = $this->input->post('tahun');
			$kegiatan = $this->input->post('kegiatan');
			$sub_bidang = $this->input->post('sub_bidang');
			$luaran = $this->input->post('luaran');
			$target_hibah = $this->input->post('target_hibah');
			$judul = $this->input->post('judul');

			/*$data = array(
				'tahun' => $tahun,
				'kegiatan' => $kegiatan,
				'sub_bidang' => $sub_bidang,
				'luaran'=> $luaran,
				'target_hibah'=> $target_hibah,
				'judul'=> $judul
			);*/

			//print_r($id_roadmap);
 
			$this->roadmap->updateRoadmap($id_roadmap, $tahun, $kegiatan, $sub_bidang, $luaran, $target_hibah, $judul, $id_dosen);
			redirect('c_sidebardosen?menu=roadmap','refresh');
	}

	public function tampilRoadmap(){
			$data['rm']=$this->roadmap->get_roadmap_dosen($this->session->userdata('id_dosen'));
			$data['tabelrm']=$this->roadmap->get_roadmap_tabel($this->session->userdata('id_dosen'),$data['rm']['id_roadmap']);
			$id_dosen=$this->session->userdata('id_dosen');
			$data2['notif']=$this->pencapaian->get_notif($id_dosen);
			$this->load->view('sidebar_dosen');
			$this->load->view('top_nav_dosen', $data2);
			$this->load->view('dosen/vr_roadmap',$data);
			$this->load->view('footer_dosen');
	}

	public function viewRoadmap()
	{
		$id_pengelola=$this->session->userdata('id_pengelola');
		//$data['roadmap']=$this->dosen->get_kk_data_dosen($id_pengelola);
		$data['roadmap']=$this->roadmap->get_list_roadmap($id_pengelola);
		$data2['notif']=$this->perencanaan->getNotif();

		$this->load->view('ketuakk/sidebar_ketuakk');
		$this->load->view('ketuakk/top_nav_ketuakk',$data2);
		$this->load->view('ketuakk/v_roadmap',$data);
		$this->load->view('ketuakk/footer_ketuakk');
	}

	public function detailRoadmap($id_dosen){
			$data['rm']=$this->roadmap->get_roadmap_dosen($id_dosen);
			$data['tabelrm']=$this->roadmap->get_roadmap_detail($id_dosen,$data['rm']['id_roadmap']);
			$data2['notif']=$this->perencanaan->getNotif();
			
			$this->load->view('ketuakk/sidebar_ketuakk');
			$this->load->view('ketuakk/top_nav_ketuakk',$data2);
			$this->load->view('ketuakk/v_roadmapDetail',$data);
			$this->load->view('ketuakk/footer_ketuakk');
	}
}