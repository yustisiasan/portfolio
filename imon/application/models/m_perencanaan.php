<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_perencanaan extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function insertPerencanaan($rpenelitian, $rpublikasi, $rpengmas, $rhaki, $rbukuajar, $rsertifikasi, $rpostingan, $periode, $tahun, $status, $id_dosen)
	{
		$sql="INSERT INTO `perencanaan`(`rpenelitian`,`rpublikasi`,`rpengmas`,`rhaki`,`rbukuajar`,`rsertifikasi`,`rpostingan`,`periode`,`tahun`,`status`,`id_dosen`) VALUES ('".$rpenelitian."', '".$rpublikasi."','".$rpengmas."','".$rhaki."','".$rbukuajar."','".$rsertifikasi."','".$rpostingan."','".$periode."','".$tahun."','".$status."','".$id_dosen."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function getTahunPeriode($periode, $tahun, $id_dosen)
	{
		$this->db->where('periode',$periode);
		$this->db->where('tahun',$tahun);
		$this->db->where('id_dosen',$id_dosen);
		return $this->db->get('perencanaan')->num_rows();
	}

	public function getData_byId($id_perencanaan)
	{
		$this->db->where('id_perencanaan',$id_perencanaan);
		return $this->db->get('perencanaan')->row(0, 'array');
	}

	public function getJmlPerencanaan($id_pengelola)
	{
		$sql = "SELECT d.id_dosen id_dosen, d.nip nip, d.nama nama, d.no_telp no_telp, d.email email, (sum(pr.rpublikasi)+ sum(pr.rpenelitian)+ sum(pr.rpengmas)+ sum(pr.rbukuajar)+ sum(pr.rsertifikasi)+ sum(pr.rpostingan)) jml_rencana
		        FROM dosen d 
		        JOIN kelompokkeahlian kk ON (d.id_kk=kk.id_kk)
		        JOIN pengelola p ON (kk.id_kk=p.id_kk)
		        LEFT OUTER JOIN perencanaan pr ON (d.id_dosen=pr.id_dosen)
		        WHERE p.id_pengelola='$id_pengelola'
		        GROUP BY d.id_dosen";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function add($data)
	{
		$this->db->insert('perencanaan',$data);
	}

	public function updateRencana($id_perencanaan,$data)
	{
		$this->db->where('id_perencanaan',$id_perencanaan);
		$this->db->update('perencanaan',$data);
	}

	public function insertNotif($data)
	{
		$this->db->insert('notifikasi',$data);
	}

	public function ubahStatus($id_perencanaan)
	{
		$sql="UPDATE `perencanaan`
		SET `status`='Disetujui'
		WHERE `id_perencanaan`='$id_perencanaan'";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function ubahStatusTolak($id_perencanaan)
	{
		$sql="UPDATE `perencanaan`
		SET `status`='Ditolak'
		WHERE `id_perencanaan`='$id_perencanaan'";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function getTotRencana($id_dosen)
	{
		$sql = "SELECT SUM(rpenelitian) rpenelitian, SUM(rpublikasi) rpublikasi, SUM(rpengmas) rpengmas, SUM(rhaki) rhaki, SUM(rbukuajar) rbukuajar, SUM(rsertifikasi) rsertifikasi, SUM(rpostingan) rpostingan
				FROM perencanaan
				WHERE status='Disetujui' and id_dosen='$id_dosen'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function getTotRencana2($id_dosen, $periode, $tahun)
	{
		$sql = "SELECT SUM(rpenelitian) rpenelitian, SUM(rpublikasi) rpublikasi, SUM(rpengmas) rpengmas, SUM(rhaki) rhaki, SUM(rbukuajar) rbukuajar, SUM(rsertifikasi) rsertifikasi, SUM(rpostingan) rpostingan
				FROM perencanaan
				WHERE status='Disetujui' and id_dosen='$id_dosen' and periode='$periode' and tahun='$tahun'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function getTotTahunPub($tahun)
	{
		$sql = "SELECT SUM(rpenelitian), SUM(rpublikasi), SUM(rpengmas), SUM(rhaki), SUM(rbukuajar), SUM(rsertifikasi), SUM(rpostingan)
				FROM perencanaan
				WHERE status='Disetujui' and tahun='".$tahun."'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function getTahun($id_dosen)
	{
		$sql="SELECT distinct tahun from perencanaan
			where id_dosen='".$id_dosen."'";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	/*public function update($jenis,$link,$poster,$keterangan)
	{
		$data = array(
			'jenis' => $jenis,
			'link' => $link,
			'poster' => $poster,
			'keterangan' => $keterangan
		);

		$this->db->where('id_informasi',$id_informasi);
		$this->db->update('informasi',$data);
	}


	public function delete($id_informasi)
	{
		$this->db->delete('informasi',array('id_informasi' => $id_informasi));
	}


	public function get_data_by_id($id_informasi)
	{
		$this->db->where('id_informasi',$id_informasi);
		$query = $this->db->get('informasi');
		return $query->row(0,'array');
	}*/

	public function get_all_data($id_dosen)
	{
		/*$query = $this->db->get('perencanaan');
		return $query->result_array();*/
		$sql = "SELECT id_perencanaan, rpenelitian, rpublikasi, rpengmas, rhaki, rbukuajar, rsertifikasi,rpostingan, periode, tahun, status, id_dosen
				FROM perencanaan
				WHERE id_dosen='$id_dosen'
				ORDER BY tahun DESC, status DESC";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_all_plan()
	{
		$sql = "SELECT DISTINCT p.id_perencanaan id_perencanaan, d.id_dosen id_dosen, nama, rpenelitian, rpublikasi, rpengmas, rhaki, rbukuajar, rsertifikasi,rpostingan, periode, tahun, p.status
				FROM perencanaan p
				JOIN dosen d on(d.id_dosen=p.id_dosen)
				ORDER BY tahun DESC, status DESC";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function getNotif()
	{
		$sql = "SELECT id_perencanaan, rpenelitian, rpublikasi, rpengmas, rhaki, rbukuajar, rsertifikasi,rpostingan, periode, tahun, p.status, p.id_dosen, nama
				FROM perencanaan p
				JOIN dosen d ON (d.id_dosen=p.id_dosen)
				WHERE p.status='Menunggu'
				ORDER BY tahun DESC, status DESC";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}
}