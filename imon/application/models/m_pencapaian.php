<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_pencapaian extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function addPencapaian($table,$data)
	{
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	public function addBukti($table,$data)
	{
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	public function getPencapaian($table, $periode)
	{
		$sql = "SELECT count(*) jumlah
				FROM $table
				WHERE status='1' and periode='".$periode."'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function get_data_by_id($table, $id_pencapaian)
	{
		$sql = "SELECT *
				FROM $table
				WHERE id_pencapaian='$id_pencapaian'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function getJmlIndikator($table)
	{
		$sql = "SELECT count(*) jumlah
				FROM $table
				WHERE status='1'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function getJmlBukti($table)
	{
		$sql = "SELECT count(*) jumlah
				FROM $table
				WHERE isi_bukti<>''";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function getJmlPublikasi($id_pengelola)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_publikasi) progress, d.id_dosen id_dosen, pk.status
		        FROM dosen d 
		        JOIN kelompokkeahlian kk ON (d.id_kk=kk.id_kk)
		        JOIN pengelola p ON (kk.id_kk=p.id_kk)
		        LEFT OUTER JOIN pk_publikasi pk ON (d.id_dosen=pk.id_dosen)
				JOIN bukti_publikasi bp ON (pk.id_pencapaian=bp.id_publikasi)
				WHERE isi_bukti<>'' AND p.id_pengelola='$id_pengelola'
		        GROUP BY d.id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getPublikasi($id_dosen)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_publikasi) progress, tgl_awal, tgl_akhir, tahun, jenis_publikasi, judul, tempat_terbit, keterangan, tgl_terbit, link, periode, status, id_dosen
				FROM pk_publikasi pk
				JOIN bukti_publikasi bp ON (pk.id_pencapaian=bp.id_publikasi)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen'
				GROUP BY  pk.id_pencapaian, jenis_publikasi, judul, tempat_terbit, keterangan, tgl_terbit, link, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getPenelitian($id_dosen)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_penelitian) progress, jenis_penelitian, judul, ketua, anggota, jumlah_dana, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_penelitian pk
				JOIN bukti_penelitian bp ON (pk.id_pencapaian=bp.id_penelitian)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen'
				GROUP BY  pk.id_pencapaian, jenis_penelitian, judul, ketua, anggota, jumlah_dana, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getPengmas($id_dosen)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_pengmas) progress, judul, ketua, anggota, jumlah_dana, tanggal, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_pengmas pk
				JOIN bukti_pengmas bp ON (pk.id_pencapaian=bp.id_pengmas)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen'
				GROUP BY  pk.id_pencapaian, ketua, judul, anggota, jumlah_dana, tanggal, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getHaki($id_dosen)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_haki) progress, pk.nama nama, judul, tanggal, status_haki, periode, tgl_awal, tgl_akhir, tahun, status, id_dosen
				FROM pk_haki pk
				JOIN bukti_haki bp ON (pk.id_pencapaian=bp.id_haki)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen'
				GROUP BY  pk.id_pencapaian, pk.nama, judul, tanggal, status_haki, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getBukuajar($id_dosen)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_bukuajar) progress, nama_penulis, judul, nama_penerbit, status_bukuajar, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_bukuajar pk
				JOIN bukti_bukuajar bp ON (pk.id_pencapaian=bp.id_bukuajar)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen'
				GROUP BY  pk.id_pencapaian, nama_penulis, judul, nama_penerbit, status_bukuajar, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getSertifikasi($id_dosen)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_sertifikasi) progress, nama, no_sertifikat, tanggal, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_sertifikasi pk
				JOIN bukti_sertifikasi bp ON (pk.id_pencapaian=bp.id_sertifikasi)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen'
				GROUP BY  pk.id_pencapaian, nama, no_sertifikat, tanggal, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getBlog($id_dosen)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_blog) progress, tgl_posting, judul, link, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_blog pk
				JOIN bukti_blog bp ON (pk.id_pencapaian=bp.id_blog)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen'
				GROUP BY  pk.id_pencapaian, tgl_posting, judul, link, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getPublikasi2($id_dosen, $periode, $tahun)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_publikasi) progress, tgl_awal, tgl_akhir, tahun, jenis_publikasi, judul, tempat_terbit, keterangan, tgl_terbit, link, periode, status, id_dosen
				FROM pk_publikasi pk
				JOIN bukti_publikasi bp ON (pk.id_pencapaian=bp.id_publikasi)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen' and periode='$periode' and tahun='$tahun'
				GROUP BY  pk.id_pencapaian, jenis_publikasi, judul, tempat_terbit, keterangan, tgl_terbit, link, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getPenelitian2($id_dosen, $periode, $tahun)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_penelitian) progress, jenis_penelitian, judul, ketua, anggota, jumlah_dana, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_penelitian pk
				JOIN bukti_penelitian bp ON (pk.id_pencapaian=bp.id_penelitian)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen' and periode='$periode' and tahun='$tahun'
				GROUP BY  pk.id_pencapaian, jenis_penelitian, judul, ketua, anggota, jumlah_dana, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getPengmas2($id_dosen, $periode, $tahun)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_pengmas) progress, judul, ketua, anggota, jumlah_dana, tanggal, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_pengmas pk
				JOIN bukti_pengmas bp ON (pk.id_pencapaian=bp.id_pengmas)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen' and periode='$periode' and tahun='$tahun'
				GROUP BY  pk.id_pencapaian, ketua, judul, anggota, jumlah_dana, tanggal, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getHaki2($id_dosen, $periode, $tahun)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_haki) progress, pk.nama nama, judul, tanggal, status_haki, periode, tgl_awal, tgl_akhir, tahun, status, id_dosen
				FROM pk_haki pk
				JOIN bukti_haki bp ON (pk.id_pencapaian=bp.id_haki)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen' and periode='$periode' and tahun='$tahun'
				GROUP BY  pk.id_pencapaian, pk.nama, judul, tanggal, status_haki, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getBukuajar2($id_dosen, $periode, $tahun)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_bukuajar) progress, nama_penulis, judul, nama_penerbit, status_bukuajar, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_bukuajar pk
				JOIN bukti_bukuajar bp ON (pk.id_pencapaian=bp.id_bukuajar)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen' and periode='$periode' and tahun='$tahun'
				GROUP BY  pk.id_pencapaian, nama_penulis, judul, nama_penerbit, status_bukuajar, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getSertifikasi2($id_dosen, $periode, $tahun)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_sertifikasi) progress, nama, no_sertifikat, tanggal, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_sertifikasi pk
				JOIN bukti_sertifikasi bp ON (pk.id_pencapaian=bp.id_sertifikasi)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen' and periode='$periode' and tahun='$tahun'
				GROUP BY  pk.id_pencapaian, nama, no_sertifikat, tanggal, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getBlog2($id_dosen, $periode, $tahun)
	{
		$sql = "SELECT pk.id_pencapaian id_pencapaian, count(bp.id_blog) progress, tgl_posting, judul, link, tgl_awal, tgl_akhir, tahun, periode, status, id_dosen
				FROM pk_blog pk
				JOIN bukti_blog bp ON (pk.id_pencapaian=bp.id_blog)
				WHERE isi_bukti<>'' AND id_dosen='$id_dosen' and periode='$periode' and tahun='$tahun'
				GROUP BY  pk.id_pencapaian, tgl_posting, judul, link, periode, status, id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function update($tgl_awal,$tgl_akhir,$status)
	{
		$data = array(
			'tgl_awal' => $tgl_awal,
			'tgl_akhir' => $tgl_akhir,
			'status' => $status
		);

		$this->db->where('id_pencapaian',$id_pencapaian);
		$this->db->update('pencapaian',$data);
	}

	public function updateBukti($tabel,$id_bukti_publikasi,$bukti)
	{
		$this->db->where($id_bukti_publikasi);
		$this->db->update($tabel,$bukti);
	}

	public function updatePencapaian($tabel, $id_pencapaian, $data)
	{
		$this->db->where('id_pencapaian',$id_pencapaian);
		$this->db->update($tabel,$data);
	}


	public function delete($id_pencapaian)
	{
		$this->db->delete('pencapaian',array('id_pencapaian' => $id));
	}

	public function get_all_data()
	{
		$query = $this->db->get('pencapaian');
		return $query->result();
	}

	public function insertNotif($id_pencapaian)
	{
		/*$sql="INSERT INTO `notifikasi`(`hak_akses`,`keterangan`,`status`,`id_pencapaian`, `jenis`) 
		VALUES ('".$hak_akses."','".$keterangan."','".$status."','".$id_pencapaian."','".$jenis."')";
		$hasil=$this->db->query($sql);
		return $hasil;*/

		$this->db->insert('notifikasi',$id_pencapaian);
		return $this->db->insert_id();
	}

	public function ubahStatus($table,$id_pencapaian)
	{
		$sql="UPDATE $table
		SET `status`='Disetujui'
		WHERE `id_pencapaian`='$id_pencapaian'";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function ubahStatusTolak($table, $id_pencapaian)
	{
		$sql="UPDATE $table
		SET `status`='Ditolak'
		WHERE `id_pencapaian`='$id_pencapaian'";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function get_notif($id_dosen)
	{
		$this->db->where('status',0);
		$this->db->where('hak_akses',$id_dosen);
		$query = $this->db->get('notifikasi');
		return $query->result_array();
	}
}