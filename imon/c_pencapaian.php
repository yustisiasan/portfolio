<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_pencapaian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pencapaian','pencapaian');
		$this->load->model('m_indikator','indikator');
		$this->load->model('m_login','dosen');
		
	}
	
	public function index()
	{
		$this->load->view('sidebar_dosen');
		$this->load->view('top_nav_dosen');
		$this->load->view('dosen/vc_pencapaian');
		$this->load->view('footer_dosen');
	}

	public function vPencapaian()
	{
		$this->load->view('ketuakk/sidebar_ketuakk');
		$this->load->view('ketuakk/top_nav_ketuakk');
		$this->load->view('ketuakk/detail_pencapaian');
		$this->load->view('ketuakk/footer_ketuakk');
	}

	public function addPencapaian()
	{
		$jenis=$this->input->post('jenis');

		$id_dosen=$this->session->userdata('id_dosen');
		$periode=$this->input->post('periode');
		$tgl_awal=$this->input->post('tgl_awal');
		$tgl_akhir=$this->input->post('tgl_akhir');
		$tahun=$this->input->post('tahun');
		$status='Menunggu';

			if ($jenis=='publikasi'){
				$jenis_publikasi=$this->input->post('jenis_publikasi');
				$judul=$this->input->post('judul');
				$tempat_terbit=$this->input->post('tempat_terbit');
				$keterangan=$this->input->post('keterangan');
				$tgl_terbit=$this->input->post('tgl_terbit');
				$link=$this->input->post('link');
				
				$publikasi= array(
					'jenis_publikasi' => $jenis_publikasi,
					'judul' => $judul,
					'tempat_terbit' => $tempat_terbit,
					'keterangan' => $keterangan,
					'tgl_terbit' => $tgl_terbit,
					'link' => $link,
					'periode' => $periode,
					'tgl_awal' => $tgl_awal,
					'tgl_akhir' => $tgl_akhir,
					'tahun' => $tahun,
					'status' => $status,
					'id_dosen' => $id_dosen
				);

				//print_r($publikasi);

				$id_pencapaian=$this->pencapaian->addPencapaian('pk_publikasi',$publikasi);

				$pub=$this->indikator->getIndikator('indikator_publikasi',$periode);
				foreach ($pub as $key) {
					$id_indikator=$key['id_indikator_publikasi'];
					if ($key['komponen_input']=='file'){
						$config['upload_path'] = './assets/documents/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|xlsx|pdf|docx';
						$doc=$this->load->library('upload', $config);

						if ($this->upload->do_upload(strtolower(str_replace(' ', '', $key['nama_indikator'])))){
							$berkas = array($this->upload->data());
							$bukti = $berkas[0]['file_name'];
							
						}else{
							$bukti = "";
							
						}
					}else{
						$bukti=$this->input->post(strtolower(str_replace(' ', '', $key['nama_indikator'])));
					}

					$data=array(
						'id_publikasi'=>$id_pencapaian,
						'id_indikator_publikasi'=>$id_indikator,
						'isi_bukti'=>$bukti
					);
					//print_r($data);
					$this->pencapaian->addBukti('bukti_publikasi',$data);
				}	
			}else if ($jenis=='penelitian'){
				$judul=$this->input->post('judul');
				$ketua=$this->input->post('ketua');
				$anggota=$this->input->post('anggota');
				$jumlah_dana=$this->input->post('jumlah_dana');
				$jenis_penelitian=$this->input->post('jenis_penelitian');
				
				$penelitian= array(
					'judul' => $judul,
					'ketua' => $ketua,
					'anggota' => $anggota,
					'jumlah_dana' => $jumlah_dana,
					'jenis_penelitian' => $jenis_penelitian,
					'periode' => $periode,
					'tgl_awal' => $tgl_awal,
					'tgl_akhir' => $tgl_akhir,
					'tahun' => $tahun,
					'status' => $status,
					'id_dosen' => $id_dosen
				);

				//print_r($penelitian);

				$id_pencapaian=$this->pencapaian->addPencapaian('pk_penelitian',$penelitian);

				$pen=$this->indikator->getIndikator('indikator_penelitian',$periode);
				foreach ($pen as $key) {
					$id_indikator=$key['id_indikator_penelitian'];
					if ($key['komponen_input']=='file'){
						$config['upload_path'] = './assets/documents/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|xlsx|pdf|docx';
						$doc=$this->load->library('upload', $config);

						if ($this->upload->do_upload(strtolower(str_replace(' ', '', $key['nama_indikator'])))){
							$berkas = array($this->upload->data());
							$bukti = $berkas[0]['file_name'];
							
						}else{
							$bukti = "";
							
						}
					}else{
						$bukti=$this->input->post(strtolower(str_replace(' ', '', $key['nama_indikator'])));
					}

					$data=array(
						'id_penelitian'=>$id_pencapaian,
						'id_indikator_penelitian'=>$id_indikator,
						'isi_bukti'=>$bukti
					);
					//print_r($data);
					$this->pencapaian->addBukti('bukti_penelitian',$data);
				}

			}else if ($jenis=='pengmas'){
				$judul=$this->input->post('judul');
				$ketua=$this->input->post('ketua');
				$anggota=$this->input->post('anggota');
				$jumlah_dana=$this->input->post('jumlah_dana');
				$tanggal=$this->input->post('tanggal');
				

				$pengmas= array(
					'judul' => $judul,
					'ketua' => $ketua,
					'anggota' => $anggota,
					'jumlah_dana' => $jumlah_dana,
					'tanggal' => $tanggal,
					'periode' => $periode,
					'tgl_awal' => $tgl_awal,
					'tgl_akhir' => $tgl_akhir,
					'tahun' => $tahun,
					'status' => $status,
					'id_dosen' => $id_dosen
				);

				//print_r($pengmas);

				$id_pencapaian=$this->pencapaian->addPencapaian('pk_pengmas',$pengmas);

				$peng=$this->indikator->getIndikator('indikator_pengmas',$periode);
				foreach ($peng as $key) {
					$id_indikator=$key['id_indikator_pengmas'];
					if ($key['komponen_input']=='file'){
						$config['upload_path'] = './assets/documents/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|xlsx|pdf|docx';
						$doc=$this->load->library('upload', $config);

						if ($this->upload->do_upload(strtolower(str_replace(' ', '', $key['nama_indikator'])))){
							$berkas = array($this->upload->data());
							$bukti = $berkas[0]['file_name'];
							
						}else{
							$bukti = "";
							
						}
					}else{
						$bukti=$this->input->post(strtolower(str_replace(' ', '', $key['nama_indikator'])));
					}

					$data=array(
						'id_pengmas'=>$id_pencapaian,
						'id_indikator_pengmas'=>$id_indikator,
						'isi_bukti'=>$bukti
					);
					//print_r($data);
					$this->pencapaian->addBukti('bukti_pengmas',$data);
				}

			}else if ($jenis=='haki'){
				$nama=$this->input->post('nama');
				$judul=$this->input->post('judul');
				$tanggal=$this->input->post('tanggal');
				$status_haki=$this->input->post('status_haki');
				
				
				$haki= array(
					'judul' => $judul,
					'tanggal' => $tanggal,
					'status_haki' => $status_haki,
					'periode' => $periode,
					'tgl_awal' => $tgl_awal,
					'tgl_akhir' => $tgl_akhir,
					'tgl_akhir' => $tgl_akhir,
					'tahun' => $tahun,
					'periode' => $periode,
					'status' => $status,
					'id_dosen' => $id_dosen
				);

				//print_r($haki);

				$id_pencapaian=$this->pencapaian->addPencapaian('pk_haki',$haki);

				$hak=$this->indikator->getIndikator('indikator_haki',$periode);
				foreach ($hak as $key) {
					$id_indikator=$key['id_indikator_haki'];
					if ($key['komponen_input']=='file'){
						$config['upload_path'] = './assets/documents/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|xlsx|pdf|docx';
						$doc=$this->load->library('upload', $config);

						if ($this->upload->do_upload(strtolower(str_replace(' ', '', $key['nama_indikator'])))){
							$berkas = array($this->upload->data());
							$bukti = $berkas[0]['file_name'];
							
						}else{
							$bukti = "";
							
						}
					}else{
						$bukti=$this->input->post(strtolower(str_replace(' ', '', $key['nama_indikator'])));
					}

					$data=array(
						'id_haki'=>$id_pencapaian,
						'id_indikator_haki'=>$id_indikator,
						'isi_bukti'=>$bukti
					);
					//print_r($data);
					$this->pencapaian->addBukti('bukti_haki',$data);
				}

			}else if ($jenis=='bukuajar'){
				$nama_penulis=$this->input->post('nama_penulis');
				$judul=$this->input->post('judul');
				$nama_penerbit=$this->input->post('nama_penerbit');
				$status_bukuajar=$this->input->post('status_bukuajar');

				$bukuajar= array(
					'nama_penulis' => $nama_penulis,
					'judul' => $judul,
					'nama_penerbit' => $nama_penerbit,
					'status_bukuajar' => $status_bukuajar,
					'periode' => $periode,
					'tgl_awal' => $tgl_awal,
					'tgl_akhir' => $tgl_akhir,
					'tahun' => $tahun,
					'status' => $status,
					'id_dosen' => $id_dosen
				);

				//print_r($bukuajar);

				$id_pencapaian=$this->pencapaian->addPencapaian('pk_bukuajar',$bukuajar);

				$pub=$this->indikator->getIndikator('indikator_bukuajar',$periode);
				foreach ($pub as $key) {
					$id_indikator=$key['id_indikator_bukuajar'];
					if ($key['komponen_input']=='file'){
						$config['upload_path'] = './assets/documents/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|xlsx|pdf|docx';
						$doc=$this->load->library('upload', $config);

						if ($this->upload->do_upload(strtolower(str_replace(' ', '', $key['nama_indikator'])))){
							$berkas = array($this->upload->data());
							$bukti = $berkas[0]['file_name'];
							
						}else{
							$bukti = "";
							
						}
					}else{
						$bukti=$this->input->post(strtolower(str_replace(' ', '', $key['nama_indikator'])));
					}

					$data=array(
						'id_bukuajar'=>$id_pencapaian,
						'id_indikator_bukuajar'=>$id_indikator,
						'isi_bukti'=>$bukti
					);
					//print_r($data);
					$this->pencapaian->addBukti('bukti_bukuajar',$data);
				}	

			}else if ($jenis=='sertifikasi'){
				$nama=$this->input->post('nama');
				$no_sertifikat=$this->input->post('no_sertifikat');
				$tanggal=$this->input->post('tanggal');

				$sertifikasi= array(
					'nama' => $nama,
					'no_sertifikat' => $no_sertifikat,
					'tanggal' => $tanggal,
					'periode' => $periode,
					'tgl_awal' => $tgl_awal,
					'tgl_akhir' => $tgl_akhir,
					'tahun' => $tahun,
					'status' => $status,
					'id_dosen' => $id_dosen
				);

				//print_r($sertifikasi);

				$id_pencapaian=$this->pencapaian->addPencapaian('pk_sertifikasi',$sertifikasi);

				$ser=$this->indikator->getIndikator('indikator_sertifikasi',$periode);
				foreach ($ser as $key) {
					$id_indikator=$key['id_indikator_sertifikasi'];
					if ($key['komponen_input']=='file'){
						$config['upload_path'] = './assets/documents/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|xlsx|pdf|docx';
						$doc=$this->load->library('upload', $config);

						if ($this->upload->do_upload(strtolower(str_replace(' ', '', $key['nama_indikator'])))){
							$berkas = array($this->upload->data());
							$bukti = $berkas[0]['file_name'];
							
						}else{
							$bukti = "";
							
						}
					}else{
						$bukti=$this->input->post(strtolower(str_replace(' ', '', $key['nama_indikator'])));
					}

					$data=array(
						'id_sertifikasi'=>$id_pencapaian,
						'id_indikator_sertifikasi'=>$id_indikator,
						'isi_bukti'=>$bukti
					);
					//print_r($data);
					$this->pencapaian->addBukti('bukti_sertifikasi',$data);
				}	

			}else if ($jenis=='postingan'){
				$tgl_posting=$this->input->post('tgl_posting');
				$judul=$this->input->post('judul');
				$link=$this->input->post('link');

				$blog= array(
					'tgl_posting' => $tgl_posting,
					'judul' => $judul,
					'link' => $link,
					'periode' => $periode,
					'tgl_awal' => $tgl_awal,
					'tgl_akhir' => $tgl_akhir,
					'tahun' => $tahun,
					'status' => $status,
					'id_dosen' => $id_dosen
				);

				//print_r($blog);

				$id_pencapaian=$this->pencapaian->addPencapaian('pk_blog',$blog);

				$ser=$this->indikator->getIndikator('indikator_blog',$periode);
				foreach ($ser as $key) {
					$id_indikator=$key['id_indikator_blog'];
					if ($key['komponen_input']=='file'){
						$config['upload_path'] = './assets/documents/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|xlsx|pdf|docx';
						$doc=$this->load->library('upload', $config);

						if ($this->upload->do_upload(strtolower(str_replace(' ', '', $key['nama_indikator'])))){
							$berkas = array($this->upload->data());
							$bukti = $berkas[0]['file_name'];
							
						}else{
							$bukti = "";
							
						}
					}else{
						$bukti=$this->input->post(strtolower(str_replace(' ', '', $key['nama_indikator'])));
					}

					$data=array(
						'id_blog'=>$id_pencapaian,
						'id_indikator_blog'=>$id_indikator,
						'isi_bukti'=>$bukti
					);
					//print_r($data);
					$this->pencapaian->addBukti('bukti_blog',$data);
				}

			}
			redirect('c_sidebardosen?menu=pencapaian');
	}

	public function getForm()
	{
		$jenis=$this->input->post('jenis');
		$periode=$this->input->post('periode');
		echo '<div class="ln_solid"></div>';
		if ($jenis=='publikasi'){
			$pub=$this->indikator->getIndikator('indikator_publikasi',$periode);
			echo '
			  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h3>Publikasi</h3>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Publikasi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="jenis_publikasi">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Publikasi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="judul">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Terbit</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="tempat_terbit">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="keterangan">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Terbit</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" class="form-control" placeholder="Masukkan Data" name="tgl_terbit">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Link</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="url" class="form-control" placeholder="Masukkan Data" name="link">
                </div>
              </div>
			';

			if(count($pub)>0){
				echo'<div class="ln_solid"></div>
					<div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <h4>Indikator</h4>
		                </div>
		            </div>';	
		        foreach ($pub as $key) {
					echo'
					  <div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$key['nama_indikator'].'</label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <input type="'.$key['komponen_input'].'" class="form-control" placeholder="Masukkan Data" name="'.strtolower(str_replace(' ', '', $key['nama_indikator'])).'">
		                </div>
		              </div>
					';
				}
			}
		}else if ($jenis=='penelitian'){
			$pen=$this->indikator->getIndikator('indikator_penelitian',$periode);
			echo'
			  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h3>Penelitian</h3>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ketua</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="ketua">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Penelitian</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="judul">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Anggota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" name="anggota"></textarea>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Dana</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="jumlah_dana">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Penelitian</label>
                <div class="col-md-6 col-sm-6 col-xs-12" id="jenis_penelitian" >
                  <select class="form-control" name="jenis_penelitian" required>
                      <option value="" >Pilih</option>
                      <option value="Dana Mandiri">Dana Mandiri</option>
                      <option value="Dana Internal">Dana Internal</option>
                      <option value="Kemitraan">Kemitraan</option>
                      <option value="Keunggulan Universitas">Keunggulan Universitas</option>
                  </select>
                </div>
              </div>
			';

			if(count($pen)>0){
				echo'<div class="ln_solid"></div>
					<div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <h4>Indikator</h4>
		                </div>
		            </div>';	
		        foreach ($pen as $key) {
					echo'
					  <div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$key['nama_indikator'].'</label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <input type="'.$key['komponen_input'].'" class="form-control" placeholder="Masukkan Data" name="'.strtolower(str_replace(' ', '', $key['nama_indikator'])).'">
		                </div>
		              </div>
					';
				}
			}

		}else if ($jenis=='pengmas'){
			$peng=$this->indikator->getIndikator('indikator_pengmas',$periode);
			echo'
			  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h3>Pengabdian Masyarakat</h3>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul PKM</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="judul">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ketua</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="ketua">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Anggota</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" name="anggota"></textarea>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Dana</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="jumlah_dana">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" class="form-control" placeholder="Masukkan Data" name="tanggal">
                </div>
              </div>
			';

			if(count($peng)>0){
				echo'<div class="ln_solid"></div>
					<div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <h4>Indikator</h4>
		                </div>
		            </div>';	
		        foreach ($peng as $key) {
					echo'
					  <div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$key['nama_indikator'].'</label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <input type="'.$key['komponen_input'].'" class="form-control" placeholder="Masukkan Data" name="'.strtolower(str_replace(' ', '', $key['nama_indikator'])).'">
		                </div>
		              </div>
					';
				}
			}

		}else if ($jenis=='haki'){
			$hak=$this->indikator->getIndikator('indikator_haki',$periode);
			echo'
			  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h3>HAKI</h3>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pengusul</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="nama">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul HAKI</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="judul">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" class="form-control" placeholder="Masukkan Data" name="tanggal">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status HAKI</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="status_haki">
                </div>
              </div>
			';

			if(count($hak)>0){
				echo'<div class="ln_solid"></div>
					<div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <h4>Indikator</h4>
		                </div>
		            </div>';	
		        foreach ($hak as $key) {
					echo'
					  <div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$key['nama_indikator'].'</label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <input type="'.$key['komponen_input'].'" class="form-control" placeholder="Masukkan Data" name="'.strtolower(str_replace(' ', '', $key['nama_indikator'])).'">
		                </div>
		              </div>
					';
				}
			}

		}else if ($jenis=='bukuajar'){
			$ba=$this->indikator->getIndikator('indikator_bukuajar',$periode);
			echo'
			  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h3>Buku Ajar</h3>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penulis</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="nama_penulis">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Buku Ajar</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="judul">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penerbit</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="nama_penerbit">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Buku Ajar</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="status_bukuajar">
                </div>
              </div>
			';

			if(count($ba)>0){
				echo'<div class="ln_solid"></div>
					<div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <h4>Indikator</h4>
		                </div>
		            </div>';	
		        foreach ($ba as $key) {
					echo'
					  <div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$key['nama_indikator'].'</label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <input type="'.$key['komponen_input'].'" class="form-control" placeholder="Masukkan Data" name="'.strtolower(str_replace(' ', '', $key['nama_indikator'])).'">
		                </div>
		              </div>
					';
				}
			}

		}else if ($jenis=='sertifikasi'){
			$ser=$this->indikator->getIndikator('indikator_sertifikasi',$periode);
			echo'
			  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h3>Sertifikasi</h3>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Sertifikasi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="nama">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Sertifikat</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="no_sertifikat">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" class="form-control" placeholder="Masukkan Data" name="tanggal">
                </div>
              </div>
			';

			if(count($ser)>0){
				echo'<div class="ln_solid"></div>
					<div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <h4>Indikator</h4>
		                </div>
		            </div>';	
		        foreach ($ser as $key) {
					echo'
					  <div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$key['nama_indikator'].'</label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <input type="'.$key['komponen_input'].'" class="form-control" placeholder="Masukkan Data" name="'.strtolower(str_replace(' ', '', $key['nama_indikator'])).'">
		                </div>
		              </div>
					';
				}
			}

		}else if ($jenis=='postingan'){
			$blog=$this->indikator->getIndikator('indikator_blog',$periode);
			echo'
			  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h3>Postingan Blog</h3>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Postingan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="judul">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Posting</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" class="form-control" placeholder="Masukkan Data" name="tgl_posting">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Link</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="url" class="form-control" placeholder="Masukkan Data" name="link">
                </div>
              </div>
			';

			if(count($blog)>0){
				echo'<div class="ln_solid"></div>
					<div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <h4>Indikator</h4>
		                </div>
		            </div>';	
		        foreach ($blog as $key) {
					echo'
					  <div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$key['nama_indikator'].'</label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <input type="'.$key['komponen_input'].'" class="form-control" placeholder="Masukkan Data" name="'.strtolower(str_replace(' ', '', $key['nama_indikator'])).'">
		                </div>
		              </div>
					';
				}
			}

		}
	}

	public function cekIndikator()
	{
		$jenis=$this->input->post('jenis');
		$periode=$this->input->post('periode');
		$table='';
		if ($jenis=='publikasi'){
			$table='indikator_publikasi';
		}else if ($jenis=='penelitian'){
			$table='indikator_penelitian';
		}else if ($jenis=='pengmas'){
			$table='indikator_pengmas';
		}else if ($jenis=='haki'){
			$table='indikator_haki';
		}else if ($jenis=='bukuajar'){
			$table='indikator_bukuajar';
		}else if ($jenis=='sertifikasi'){
			$table='indikator_sertifikasi';
		}else if ($jenis=='postingan'){
			$table='indikator_blog';
		}
		$jumlah_baris=$this->indikator->cekIndikator($table,$periode);
		echo $jumlah_baris;
	}

	public function detailPencapaian()
	{
			$data['profil']=$this->dosen->get_profil_dosen($this->session->userdata('id_dosen'));

			$data['ppublikasi']=$this->pencapaian->getPublikasi($this->session->userdata('id_dosen'));
			$data['jum_indikator']=array();
			foreach ($data['ppublikasi'] as $key) {
				$jum=$this->pencapaian->getPencapaian('indikator_publikasi',$key['periode']);
				array_push($data['jum_indikator'], $jum['jumlah']);
			}

			$data['ppenelitian']=$this->pencapaian->getPenelitian($this->session->userdata('id_dosen'));
			$data['jml_ipen']=array();
			foreach ($data['ppenelitian'] as $key) {
				$jum=$this->pencapaian->getPencapaian('indikator_penelitian',$key['periode']);
				array_push($data['jml_ipen'], $jum['jumlah']);
			}

			$data['ppengmas']=$this->pencapaian->getPengmas($this->session->userdata('id_dosen'));
			$data['jml_ipeng']=array();
			foreach ($data['ppengmas'] as $key) {
				$jum=$this->pencapaian->getPencapaian('indikator_pengmas',$key['periode']);
				array_push($data['jml_ipeng'], $jum['jumlah']);
			}

			$data['phaki']=$this->pencapaian->getPengmas($this->session->userdata('id_dosen'));
			$data['jml_ihak']=array();
			foreach ($data['phaki'] as $key) {
				$jum=$this->pencapaian->getPencapaian('indikator_haki',$key['periode']);
				array_push($data['jml_ihak'], $jum['jumlah']);
			}

			$data['pbukuajar']=$this->pencapaian->getBukuAjar($this->session->userdata('id_dosen'));
			$data['jml_iba']=array();
			foreach ($data['pbukuajar'] as $key) {
				$jum=$this->pencapaian->getPencapaian('indikator_bukuajar',$key['periode']);
				array_push($data['jml_iba'], $jum['jumlah']);
			}

			$data['psertifikasi']=$this->pencapaian->getSertifikasi($this->session->userdata('id_dosen'));
			$data['jml_iser']=array();
			foreach ($data['psertifikasi'] as $key) {
				$jum=$this->pencapaian->getPencapaian('indikator_sertifikasi',$key['periode']);
				array_push($data['jml_iser'], $jum['jumlah']);
			}

			$data['pblog']=$this->pencapaian->getBlog($this->session->userdata('id_dosen'));
			$data['jml_iblog']=array();
			foreach ($data['pblog'] as $key) {
				$jum=$this->pencapaian->getPencapaian('indikator_blog',$key['periode']);
				array_push($data['jml_iblog'], $jum['jumlah']);
			}

			//print_r($data);
			$this->load->view('sidebar_dosen');
			$this->load->view('top_nav_dosen');
			$this->load->view('dosen/vr_pencapaian', $data);
			$this->load->view('footer_dosen');	
	}


	public function daftarPencapaian()
	{
		$jenis=$this->input->post('jenis');
		if ($jenis=='publikasi'){
			$pub=$this->pencapaian->getPencapaian('pk_publikasi');
				if (count($pub)>0){
					$no=1;
					foreach ($pub as $key) {
		              echo '
		                <tr>
		                  <td>'.$no.'</td>
		                  <td>'.$key["nama_indikator"].'</td>
		                  <td>'.$key["komponen_input"].'</td>
		                  <td>'.$key["periode"].'</td>
		                  <td><a href="#modalUbah" data-toggle="modal" data-id="'.$key["id_indikator_publikasi"].'"><i class="fa fa-pencil"></i> Ubah</a></td>
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

		}else if ($jenis=='pengmas'){

		}else if ($jenis=='haki'){

		}else if ($jenis=='bukuajar'){

		}else if ($jenis=='sertifikasi'){

		}else if ($jenis=='postingan'){

		}
	}

	public function getFormUbah()
	{
		$jenis=$this->input->post('jenis');
		$id_pencapaian=$this->input->post('id');
		$periode=$this->input->post('periode');


		//Ambil form berdasarkan
		if($jenis=="publikasi"){
			//get form berdasarkan jenis
			$data=$this->pencapaian->getData('pk_publikasi',$id_pencapaian);
			//get indikator berdasarkan jenis
			$ind=$this->indikator->getIndikator('indikator_publikasi',$periode);
			//get indikator yang udah diisi
			$isiInd=$this->indikator->getIndikator('indikator_publikasi',$periode);
			echo '
			  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h3>Publikasi</h3>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Publikasi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" value="" name="jenis_publikasi">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Publikasi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="judul">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Terbit</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="tempat_terbit">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" placeholder="Masukkan Data" name="keterangan">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Terbit</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" class="form-control" placeholder="Masukkan Data" name="tgl_terbit">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Link</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="url" class="form-control" placeholder="Masukkan Data" name="link">
                </div>
              </div>
			';

			if(count($pub)>0){
				echo'<div class="ln_solid"></div>
					<div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                  <h4>Indikator</h4>
		                </div>
		            </div>';	
		        foreach ($pub as $key) {
					echo'
					  <div class="item form-group">
		                <label class="control-label col-md-3 col-sm-3 col-xs-12">'.$key['nama_indikator'].'</label>
		                <div class="col-md-3 col-sm-3 col-xs-12">
		                  <input type="'.$key['komponen_input'].'" class="form-control" placeholder="Masukkan Data" name="'.strtolower(str_replace(' ', '', $key['nama_indikator'])).'">
		                </div>
		                <div class="col-md-3 col-sm-3 col-xs-12">';
		                foreach ($isiInd as $dt) {
		                	if($key['id_publikasi']==$dt['id_publikasi']){
		                		//tulis judul isi buktinya
		                		echo '<span></span>';
		                	}
		                }
		            echo '</div>
		              </div>';
				}
			}

		}

	}

	public function notifikasi($value='')
	{
		# code...
	}

	
}