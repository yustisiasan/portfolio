<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_indikator extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_indikator','indikator');
		$this->load->model('m_perencanaan', 'perencanaan');
	}
	
	public function index()
	{
		$this->load->view('ketuakk/sidebar_ketuakk');
		$this->load->view('ketuakk/top_nav_ketuakk');
		$this->load->view('ketuakk/vr_indikator');
		$this->load->view('ketuakk/footer_ketuakk');
	}

	public function tambah()
	{
			$data2['notif']=$this->perencanaan->getNotif();

			$data['ipublikasi']=$this->indikator->get_indikator_publikasi();
			$data['ipenelitian']=$this->indikator->get_indikator_penelitian();
			$data['ipengmas']=$this->indikator->get_indikator_pengmas();
			$data['ihaki']=$this->indikator->get_indikator_haki();
			$data['ibukuajar']=$this->indikator->get_indikator_bukuajar();
			$data['isertifikasi']=$this->indikator->get_indikator_sertifikasi();
			$data['iblog']=$this->indikator->get_indikator_blog();


			$this->load->view('ketuakk/sidebar_ketuakk');
			$this->load->view('ketuakk/top_nav_ketuakk',$data2);
			$this->load->view('ketuakk/vc_indikator', $data);
			$this->load->view('ketuakk/footer_ketuakk');
	}

	public function addIndikator()
	{
		if($this->input->post('pilih')){
			//dikondisikan (if else) jika jenisnya publikasi insertnya ke tabel publikasi dsb.
			$jenis=$this->input->post('jenis');
			$nama_indikator=$this->input->post('nama_indikator');
			$komponen_input=$this->input->post('komponen_input');
			$periode=$this->input->post('periode');
			$status=0;
			if($jenis=='publikasi'){
				$this->indikator->addIndikatorPublikasi($nama_indikator, $komponen_input, $periode, $status);
				redirect('c_indikator/tambah','refresh');
			}else if($jenis=='penelitian'){
				$this->indikator->addIndikatorPenelitian($nama_indikator, $komponen_input, $periode, $status);
				redirect('c_indikator/tambah','refresh');
			}else if($jenis=='pengmas'){
				$this->indikator->addIndikatorPengmas($nama_indikator, $komponen_input, $periode, $status);
				redirect('c_indikator/tambah','refresh');
			}else if($jenis=='haki'){
				$this->indikator->addIndikatorHaki($nama_indikator, $komponen_input, $periode, $status);
				redirect('c_indikator/tambah','refresh');
			}else if($jenis=='bukuajar'){
				$this->indikator->addIndikatorBukuajar($nama_indikator, $komponen_input, $periode, $status);
				redirect('c_indikator/tambah','refresh');
			}else if($jenis=='sertifikasi'){
				$this->indikator->addIndikatorSertifikasi($nama_indikator, $komponen_input, $periode, $status);
				redirect('c_indikator/tambah','refresh');
			}else if($jenis=='blog'){
				$this->indikator->addIndikatorBlog($nama_indikator, $komponen_input, $periode, $status);
				redirect('c_indikator/tambah','refresh');
			}else{
				echo 'ada yang salah';
			}
		}
	}

	public function daftarIndikator()
	{
		$jenis=$this->input->post('jenis');

			if ($jenis=='publikasi'){
				$pub=$this->indikator->get_pkIndikator('indikator_publikasi');
				if (count($pub)>0){
					$no=1;
					foreach ($pub as $key) {
		              echo '
		                <tr>
		                  <td>'.$no.'</td>
		                  <td>'.$key["nama_indikator"].'</td>
		                  <td>'.$key["komponen_input"].'</td>
		                  <td>'.$key["periode"].'</td>
		                  <td><a href="#indikatorUbah" data-toggle="modal" data-id="'.$key["id_indikator_publikasi"].'"><i class="fa fa-pencil"></i> Ubah</a></td>
		                </tr>
		              ';
		              $no++;
		          	}
				}else{
					echo'
	                    <tr>
	                      <td colspan="5" align="center">Data Kosong</td>
	                    </tr>
	                    ';
				}
				
			}else if ($jenis=='penelitian'){
				$pen=$this->indikator->get_pkIndikator('indikator_penelitian');
				if (count($pen)>0){
					$no=1;
					foreach ($pen as $key) {
		              echo '
		                <tr>
		                  <td>'.$no.'</td>
		                  <td>'.$key["nama_indikator"].'</td>
		                  <td>'.$key["komponen_input"].'</td>
		                  <td>'.$key["periode"].'</td>
		                  <td><a href="#modalUbah" data-toggle="modal" data-id="'.$key["id_indikator_penelitian"].'"><i class="fa fa-pencil"></i> Ubah</a></td>
		                </tr>
		              ';
		              $no++;
		          	}
				}else{
					echo'
	                    <tr>
	                      <td colspan="5" align="center">Data Kosong</td>
	                    </tr>
	                    ';
				}
			}else if ($jenis=='pengmas'){
				$peng=$this->indikator->get_pkIndikator('indikator_pengmas');
				if (count($peng)>0){
					$no=1;
					foreach ($peng as $key) {
		              echo '
		                <tr>
		                  <td>'.$no.'</td>
		                  <td>'.$key["nama_indikator"].'</td>
		                  <td>'.$key["komponen_input"].'</td>
		                  <td>'.$key["periode"].'</td>
		                  <td><a href="#modalUbah" data-toggle="modal" data-id="'.$key["id_indikator_pengmas"].'"><i class="fa fa-pencil"></i> Ubah</a></td>
		                </tr>
		              ';
		              $no++;
		          	}
				}else{
					echo'
	                    <tr>
	                      <td colspan="5" align="center">Data Kosong</td>
	                    </tr>
	                    ';
				}

			}else if ($jenis=='haki'){
				$hak=$this->indikator->get_pkIndikator('indikator_haki');
				if (count($hak)>0){
					$no=1;
					foreach ($hak as $key) {
		              echo '
		                <tr>
		                  <td>'.$no.'</td>
		                  <td>'.$key["nama_indikator"].'</td>
		                  <td>'.$key["komponen_input"].'</td>
		                  <td>'.$key["periode"].'</td>
		                  <td><a href="#modalUbah" data-toggle="modal" data-id="'.$key["id_indikator_haki"].'"><i class="fa fa-pencil"></i> Ubah</a></td>
		                </tr>
		              ';
		              $no++;
		          	}
				}else{
					echo'
	                    <tr>
	                      <td colspan="5" align="center">Data Kosong</td>
	                    </tr>
	                    ';
				}

			}else if ($jenis=='bukuajar'){
				$ba=$this->indikator->get_pkIndikator('indikator_bukuajar');
				if (count($ba)>0){
					$no=1;
					foreach ($ba as $key) {
		              echo '
		                <tr>
		                  <td>'.$no.'</td>
		                  <td>'.$key["nama_indikator"].'</td>
		                  <td>'.$key["komponen_input"].'</td>
		                  <td>'.$key["periode"].'</td>
		                  <td><a href="#modalUbah" data-toggle="modal" data-id="'.$key["id_indikator_bukuajar"].'"><i class="fa fa-pencil"></i> Ubah</a></td>
		                </tr>
		              ';
		              $no++;
		          	}
				}else{
					echo'
	                    <tr>
	                      <td colspan="5" align="center">Data Kosong</td>
	                    </tr>
	                    ';
				}

			}else if ($jenis=='sertifikasi'){
				$ser=$this->indikator->get_pkIndikator('indikator_sertifikasi');
				if (count($ser)>0){
					$no=1;
					foreach ($ser as $key) {
		              echo '
		                <tr>
		                  <td>'.$no.'</td>
		                  <td>'.$key["nama_indikator"].'</td>
		                  <td>'.$key["komponen_input"].'</td>
		                  <td>'.$key["periode"].'</td>
		                  <td><a href="#modalUbah" data-toggle="modal" data-id="'.$key["id_indikator_sertifikasi"].'"><i class="fa fa-pencil"></i> Ubah</a></td>
		                </tr>
		              ';
		              $no++;
		          	}
				}else{
					echo'
	                    <tr>
	                      <td colspan="5" align="center">Data Kosong</td>
	                    </tr>
	                    ';
				}

			}else if ($jenis=='postingan'){
				$blog=$this->indikator->get_pkIndikator('indikator_blog');
				if (count($blog)>0){
					$no=1;
					foreach ($blog as $key) {
		              echo '
		                <tr>
		                  <td>'.$no.'</td>
		                  <td>'.$key["nama_indikator"].'</td>
		                  <td>'.$key["komponen_input"].'</td>
		                  <td>'.$key["periode"].'</td>
		                  <td><a href="#modalUbah" data-toggle="modal" data-id="'.$key["id_indikator_blog"].'"><i class="fa fa-pencil"></i> Ubah</a></td>
		                </tr>
		              ';
		              $no++;
		          	}
				}else{
					echo'
	                    <tr>
	                      <td colspan="5" align="center">Data Kosong</td>
	                    </tr>
	                    ';
				}

			}
	}

	public function detailIndikator(){
			$data2['notif']=$this->perencanaan->getNotif();

			$data['dpublikasi']=$this->indikator->get_detail_publiksi();
			$this->load->view('ketuakk/sidebar_ketuakk');
			$this->load->view('ketuakk/top_nav_ketuakk', $data2);
			$this->load->view('ketuakk/vr_indikator', $data);
			$this->load->view('ketuakk/footer_ketuakk');	
	}

	public function ubahStatus()
	{
		$this->indikator->updateIndikatorPublikasi();
		$this->indikator->updateIndikatorPenelitian();
		$this->indikator->updateIndikatorPengmas();
		$this->indikator->updateIndikatorHaki();
		$this->indikator->updateIndikatorBukuajar();
		$this->indikator->updateIndikatorSertifikasi();
		$this->indikator->updateIndikatorBlog();
		redirect('c_indikator/tambah','refresh');
	}

	public function hapusIndikator($jenis, $id_indikator)
	{
		if($jenis=='publikasi'){
			$this->indikator->delInPublikasi($id_indikator);
		}else if ($jenis=='penelitian'){
			$this->indikator->delInPenelitian($id_indikator);
		}else if ($jenis=='pengmas'){
			$this->indikator->delInPengmas($id_indikator);
		}else if ($jenis=='haki'){
			$this->indikator->delInHaki($id_indikator);
		}else if ($jenis=="bukuajar"){
			$this->indikator->delInBukuajar($id_indikator);
		}else if ($jenis=="sertifikasi"){
			$this->indikator->delInSertifikasi($id_indikator);
		}else if ($jenis=="blog"){
			$this->indikator->delInBlog($id_indikator);
		}
		redirect('c_indikator/tambah','refresh');
	}

	public function vkonfHapus()
	{
		$indikator=$this->input->post('rowid');
		$jenis=$this->input->post('jenis');
		
		echo'
			  <div class="modal-body">
			  	Apakah anda yakin akan menghapus indikator '.$jenis.' dengan id '.$indikator.'?
			  </div>
			  <div class="modal-footer">
			  	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			  	<a href="'.base_url().'c_indikator/hapusIndikator/'.$jenis.'/'.$indikator.'" class="btn btn-danger">Ya</a>
			  </div>
		';
	}

	public function ubahIndikator(){
			$id_dosen = $this->session->userdata('id_pengelola');
			$id_indikator_publikasi = $this->input->post('id_indikator_publikasi');
			$nama_indikator = $this->input->post('nama_indikator');
			$komponen_input = $this->input->post('komponen_input');
			$periode = $this->input->post('periode');
			

			$data = array(
				'nama_indikator' => $nama_indikator,
				'komponen_input' => $komponen_input,
				'periode' => $periode

			);
 
			
			$this->indikator->updateIPublikasi($id_indikator_publikasi, $data);
			redirect('c_sidebarketuakk?menu=indikator','refresh');
	}


}