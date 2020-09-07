<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_indikator extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function cekIndikator($table,$periode)
	{
		$this->db->where('status','1');
		$this->db->where('periode',$periode);
		return $this->db->get($table)->num_rows();
	}

	public function getIndikator($table,$periode)
	{
		$this->db->where('status','1');
		$this->db->where('periode',$periode);
		return $this->db->get($table)->result_array();
	}

	public function getBukti($table)
	{
		$sql = "SELECT *
				FROM $table
				WHERE isi_bukti<>''";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getBuktiTdkKosong($table, $id_bukti)
	{
		$sql = "SELECT *
				FROM $table
				WHERE $id_bukti";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_pkIndikator($table)
	{
		$this->db->where('status','1');
		return $this->db->get($table)->result_array();
	}

	public function addIndikatorPublikasi($nama_indikator, $komponen_input, $periode, $status)
	{
		$sql="INSERT INTO `indikator_publikasi`(`nama_indikator`,`komponen_input`,`periode`,`status`) 
		VALUES ('".$nama_indikator."','".$komponen_input."','".$periode."','".$status."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function addIndikatorPenelitian($nama_indikator, $komponen_input, $periode, $status)
	{
		$sql="INSERT INTO `indikator_penelitian`(`nama_indikator`,`komponen_input`,`periode`,`status`) 
		VALUES ('".$nama_indikator."','".$komponen_input."','".$periode."','".$status."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function addIndikatorPengmas($nama_indikator, $komponen_input, $periode, $status)
	{
		$sql="INSERT INTO `indikator_pengmas`(`nama_indikator`,`komponen_input`,`periode`,`status`) 
		VALUES ('".$nama_indikator."','".$komponen_input."','".$periode."','".$status."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function addIndikatorHaki($nama_indikator, $komponen_input, $periode, $status)
	{
		$sql="INSERT INTO `indikator_haki`(`nama_indikator`,`komponen_input`,`periode`,`status`) 
		VALUES ('".$nama_indikator."','".$komponen_input."','".$periode."','".$status."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function addIndikatorBukuajar($nama_indikator, $komponen_input, $periode, $status)
	{
		$sql="INSERT INTO `indikator_bukuajar`(`nama_indikator`,`komponen_input`,`periode`,`status`) 
		VALUES ('".$nama_indikator."','".$komponen_input."','".$periode."','".$status."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function addIndikatorSertifikasi($nama_indikator, $komponen_input, $periode, $status)
	{
		$sql="INSERT INTO `indikator_sertifikasi`(`nama_indikator`,`komponen_input`,`periode`,`status`) 
		VALUES ('".$nama_indikator."','".$komponen_input."','".$periode."','".$status."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function addIndikatorBlog($nama_indikator, $komponen_input, $periode, $status)
	{
		$sql="INSERT INTO `indikator_blog`(`nama_indikator`,`komponen_input`,`periode`,`status`) 
		VALUES ('".$nama_indikator."','".$komponen_input."','".$periode."','".$status."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function updateIndikatorPublikasi()
	{
		$sql="UPDATE `indikator_publikasi`
		SET `status`=1
		WHERE `status`=0";
		$hasil=$this->db->query($sql);
		return $hasil;
		
	}

	public function updateIndikatorPenelitian()
	{
		$sql="UPDATE `indikator_penelitian`
		SET `status`=1
		WHERE `status`=0";
		$hasil=$this->db->query($sql);
		return $hasil;
		
	}

	public function updateIndikatorPengmas()
	{
		$sql="UPDATE `indikator_pengmas`
		SET `status`=1
		WHERE `status`=0";
		$hasil=$this->db->query($sql);
		return $hasil;
		
	}

	public function updateIndikatorHaki()
	{
		$sql="UPDATE `indikator_haki`
		SET `status`=1
		WHERE `status`=0";
		$hasil=$this->db->query($sql);
		return $hasil;
		
	}

	public function updateIndikatorBukuajar()
	{
		$sql="UPDATE `indikator_bukuajar`
		SET `status`=1
		WHERE `status`=0";
		$hasil=$this->db->query($sql);
		return $hasil;
		
	}

	public function updateIndikatorSertifikasi()
	{
		$sql="UPDATE `indikator_sertifikasi`
		SET `status`=1
		WHERE `status`=0";
		$hasil=$this->db->query($sql);
		return $hasil;
		
	}

	public function updateIndikatorBlog()
	{
		$sql="UPDATE `indikator_blog`
		SET `status`=1
		WHERE `status`=0";
		$hasil=$this->db->query($sql);
		return $hasil;
		
	}


	public function delInPublikasi($id_indikator_publikasi)
	{
		$this->db->where('id_indikator_publikasi',$id_indikator_publikasi);
		return $this->db->delete('indikator_publikasi');
	}

	public function delInPenelitian($id_indikator_penelitian)
	{
		$this->db->where('id_indikator_penelitian',$id_indikator_penelitian);
		return $this->db->delete('indikator_penelitian');
	}

	public function delInPengmas($id_indikator_pengmas)
	{
		$this->db->where('id_indikator_pengmas',$id_indikator_pengmas);
		return $this->db->delete('indikator_pengmas');
	}

	public function delInHaki($id_indikator_haki)
	{
		$this->db->where('id_indikator_haki',$id_indikator_haki);
		return $this->db->delete('indikator_haki');
	}

	public function delInBukuajar($id_indikator_bukuajar)
	{
		$this->db->where('id_indikator_bukuajar',$id_indikator_bukuajar);
		return $this->db->delete('indikator_bukuajar');
	}

	public function delInSertifikasi($id_indikator_sertifikasi)
	{
		$this->db->where('id_indikator_sertifikasi',$id_indikator_sertifikasi);
		return $this->db->delete('indikator_sertifikasi');
	}

	public function delInBlog($id_indikator_blog)
	{
		$this->db->where('id_indikator_blog',$id_indikator_blog);
		return $this->db->delete('indikator_blog');
	}

	public function get_data_by_id($id_informasi)
	{
		$this->db->where('id_informasi',$id_informasi);
		$query = $this->db->get('informasi');
		return $query->row(0,'array');
	}

	public function get_indikator_publikasi()
	{
		$sql = "SELECT id_indikator_publikasi, nama_indikator, komponen_input, periode, status
				FROM indikator_publikasi
				WHERE status=0
				ORDER BY periode desc ";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_indikator_penelitian()
	{
		$sql = "SELECT id_indikator_penelitian, nama_indikator, komponen_input, periode, status
				FROM indikator_penelitian
				WHERE status=0
				ORDER BY periode desc ";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_indikator_pengmas()
	{
		$sql = "SELECT id_indikator_pengmas, nama_indikator, komponen_input, periode, status
				FROM indikator_pengmas
				WHERE status=0
				ORDER BY periode desc ";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_indikator_haki()
	{
		$sql = "SELECT id_indikator_haki, nama_indikator, komponen_input, periode, status
				FROM indikator_haki
				WHERE status=0
				ORDER BY periode desc";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_indikator_bukuajar()
	{
		$sql = "SELECT id_indikator_bukuajar, nama_indikator, komponen_input, periode, status
				FROM indikator_bukuajar
				WHERE status=0
				ORDER BY periode desc ";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_indikator_sertifikasi()
	{
		$sql = "SELECT id_indikator_sertifikasi, nama_indikator, komponen_input, periode, status
				FROM indikator_sertifikasi
				WHERE status=0
				ORDER BY periode desc ";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_indikator_blog()
	{
		$sql = "SELECT id_indikator_blog, nama_indikator, komponen_input, periode, status
				FROM indikator_blog
				WHERE status=0
				ORDER BY periode desc ";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_detail_publiksi()
	{
		$sql = "SELECT id_indikator_publikasi, nama_indikator, komponen_input, periode, status
				FROM indikator_publikasi
				WHERE status=1
				ORDER BY periode desc ";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function updateIPublikasi($id_indikator_publikasi,$data)
	{
		$this->db->where('id_indikator_publikasi',$id_indikator_publikasi);
		$this->db->update('indikator_publikasi',$data);
	}
}