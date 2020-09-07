<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_roadmap extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function insertRoadmap($data)
	{
		return $this->db->insert('roadmap',$data);
	}

	/*public function insertRoadmap($penelitian_unggulan, $bidang_penelitian, $produk, $alat, $tahun, $kegiatan, $sub_bidang, $luaran, $target_hibah, $judul, $id_dosen)
	{
		$sql="INSERT INTO `roadmap`(`penelitian_unggulan`,`bidang_penelitian`,`produk`,`alat`,`tahun`,`kegiatan`,`sub_bidang`,`luaran`,`target_hibah`,`judul`,`id_dosen`) 
		VALUES ('".$penelitian_unggulan."','".$bidang_penelitian."','".$produk."','".$alat."','".$tahun."','".$kegiatan."','".$sub_bidang."','".$luaran."','".$target_hibah."','".$judul."','".$id_dosen."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}*/

	public function addHeadRoadmap($penelitian_unggulan, $bidang_penelitian, $produk, $alat, $id_dosen)
	{
		$sql="INSERT INTO `roadmap`(`penelitian_unggulan`,`bidang_penelitian`,`produk`,`alat`,`id_dosen`) 
		VALUES ('".$penelitian_unggulan."','".$bidang_penelitian."','".$produk."','".$alat."','".$id_dosen."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function add($data)
	{
		$this->db->insert('roadmap',$data);
	}

	public function get_roadmap_dosen($id_dosen)
	{
		$this->db->where('id_dosen',$id_dosen);
		$query = $this->db->get('roadmap');
		return $query->row(0,'array');
	}

	public function get_roadmap_tabel($id_dosen,$id_roadmap)
	{
		$sql = "SELECT id_roadmap, tahun, kegiatan, sub_bidang, luaran, target_hibah, judul
				FROM roadmap 
				WHERE id_roadmap<>'$id_roadmap' and id_dosen='$id_dosen'
				ORDER BY tahun";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();

		/*$this->db->where('id_dosen',$id_dosen);
		$hasil = $this->db->get('roadmap');
		return $hasil->result_array();*/
	}


	public function get_roadmap_detail($id_dosen)
	{
		$sql = "SELECT id_roadmap, tahun, kegiatan, sub_bidang, luaran, target_hibah, judul
				FROM roadmap 
				WHERE id_dosen='$id_dosen' and tahun<>''
				ORDER BY tahun";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_list_roadmap($id_pengelola)
	{
		$sql = "SELECT DISTINCT d.id_dosen id_dosen, d.nip nip, d.nama nama, d.username username, d.password password, d.no_telp no_telp, d.email email, d.foto foto, d.status status, r.penelitian_unggulan penelitian_unggulan, r.bidang_penelitian bidang_penelitian
				FROM kelompokkeahlian kk
				JOIN pengelola p ON (kk.id_kk=p.id_kk)
				JOIN dosen d ON (kk.id_kk=d.id_kk)
				JOIN roadmap r ON (d.id_dosen=r.id_dosen)
				WHERE p.id_pengelola='$id_pengelola' and r.tahun=''
				";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function updateHead($id_roadmap,$data)
	{
		$this->db->where('id_roadmap',$id_roadmap);
		$this->db->update('roadmap',$data);
	}

	public function updateRoadmap($id_roadmap, $tahun, $kegiatan, $sub_bidang, $luaran, $target_hibah, $judul, $id_dosen)
	{
		$sql = "UPDATE roadmap set tahun='$tahun', kegiatan='$kegiatan', sub_bidang='$sub_bidang', luaran='$luaran', target_hibah='$target_hibah', judul='$judul'
				WHERE id_roadmap='$id_roadmap'";
		return $this->db->query($sql);

		/*$this->db->where('id_roadmap',$id_roadmap);
		$this->db->update('roadmap',$data);*/
	}
	public function get_roadmap_id($id_roadmap)
	{
		$this->db->where('id_roadmap',$id_roadmap);
		return $this->db->get('roadmap')->row(0,'array');
	}


	/*public function delete($id_informasi)
	{
		$this->db->delete('informasi',array('id_informasi' => $id_informasi));
	}


	public function get_data_by_id($id_informasi)
	{
		$this->db->where('id_informasi',$id_informasi);
		$query = $this->db->get('informasi');
		return $query->row(0,'array');
	}

	public function get_all_data()
	{
		$query = $this->db->get('informasi');
		return $query->result();
	}*/
}