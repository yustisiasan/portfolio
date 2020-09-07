<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_informasi extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function insertInformasi($jenis, $judul, $link, $poster, $id_pengelola)
	{
		$sql="INSERT INTO `informasi`(`jenis`,`judul`,`link`,`poster`,`id_pengelola`) 
		VALUES ('".$jenis."','".$judul."','".$link."','".$poster."','".$id_pengelola."')";
		$hasil=$this->db->query($sql);
		return $hasil;
	}

	public function add($data)
	{
		$this->db->insert('informasi',$data);
	}

	public function updateInformasi($id_informasi, $data)
	{
		$this->db->where('id_informasi',$id_informasi);
		$this->db->update('informasi',$data);;
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
	}

	public function get_all_data()
	{
		//$query = $this->db->get('informasi');
		//return $query->result_array();

		//$sql = "SELECT id_informasi, jenis, concat(substr(judul, 1,22),'...') judul, link, poster, id_pengelola
		//		FROM informasi";
		//$hasil=$this->db->query($sql);
		//return $hasil->result_array();

		$sql = "SELECT id_informasi, jenis, case judul when length(judul)<20 then concat(substr(judul, 1,20),'...') else judul end judul, link, poster, id_pengelola
				FROM informasi";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_info_detail()
	{
		$query = $this->db->get('informasi');
		return $query->result_array();

	}

	public function delInformasi($id_informasi)
	{
		$this->db->where('id_informasi',$id_informasi);
		return $this->db->delete('informasi');
	}

}