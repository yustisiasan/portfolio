<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_user extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	protected $_tabel = 'dosen';

	public function verify($key)
	{
		$data = array('status' => "Aktif");
		$this->db->where('md5(email)', $key);
		return $this->db->update($this->_tabel, $data);
	}

	public function add_dosen($data)
	{
		$dosen = (object) $data;
		$this->db->insert('dosen',$dosen);
		return true;
	}

	public function add_ketua($data)
	{
		$this->db->insert('pengelola',$data);
	}

	public function add_pengelola($data)
	{
		$obj=(object)$data;
		$this->db->insert('pengelola',$obj);
		return $this->db->insert_id();
	}

	public function update_dosen($id_dosen, $data)
	{
		$this->db->where('id_dosen', $id_dosen);
		$this->db->update('dosen', $data);
	}

	public function update_pengelola($id_pengelola, $data)
	{
		$this->db->where('id_pengelola', $id_pengelola);
		$this->db->update('pengelola', $data);
	}


	public function delete_dosen($username)
	{
		$this->db->delete('dosen',array('id_dosen' => $username));
	}

	public function delete_pengelola($username)
	{
		$this->db->delete('pengelola',array('id_pengelola' => $username));
	}

	public function cek_username_dosen($str,$pass)
	{
		$kondisi = "username = '".$str."' AND password = '".$pass."' AND status='Aktif'";
		$this->db->where($kondisi);
		$this->db->limit(1);
		// $this->db->where('username',$str);
		// $this->db->where('password',$pass);
		$query = $this->db->get('dosen');

		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function validate_password($password)
	{
		if(password_verify($password, $this->stored_hash())){
			return $password;
		}else{
			return FALSE;
		}
	}

	public function cek_username_pengelola($str,$pass)
	{
		//kondisi = "username = '".$str."' AND password = '".$pass."' AND status='Aktif'";
		//$this->db->where($kondisi);
		//$this->db->limit(1);
		$this->db->where('username',$str);
		$this->db->where('password',$pass);
		$query = $this->db->get('pengelola');
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function cek_account_dosen($username)
	{
		$this->db->select('password');
		$this->db->from('dosen');
		$this->db->where('id_dosen',$username);
		$query = $this->db->get();

		return $query->row(0,'array');
	}

	public function cek_account_pengelola($username)
	{
		$this->db->select('password');
		$this->db->from('pengelola');
		$this->db->where('id_pengelola',$username);
		$query = $this->db->get();

		return $query->row(0,'array');
	}

	public function get_data_by_uid_dosen($username)
	{
		$this->db->where('id_dosen',$username);
		$query = $this->db->get('dosen');
		return $query->row(0,'array');
	}

	public function get_data_by_uid_pengelola($username)
	{
		$this->db->where('id_pengelola',$username);
		$query = $this->db->get('pengelola');
		return $query->row(0,'array');
	}


	public function get_data_by_uname_dosen($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('dosen');
		return $query->row(0,'array');
	}

	public function get_data_by_uname_pengelola($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('pengelola');
		return $query->row(0,'array');
	}

	public function get_all_data_dosen()
	{
		$query = $this->db->get('dosen');
		return $query->result_array();
	}

	public function get_all_dosen()
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('kelompokkeahlian', 'kelompokkeahlian.id_kk = dosen.id_kk');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all_ketua()
	{
		$this->db->select('*');
		$this->db->from('pengelola');
		$this->db->join('kelompokkeahlian', 'kelompokkeahlian.id_kk = pengelola.id_kk');
		$this->db->where('level','2');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_kk_data_dosen($id_pengelola)
	{
		$sql = "SELECT DISTINCT d.id_dosen id_dosen, d.nip nip, d.nama nama, d.username username, d.password password, d.no_telp no_telp, d.email email, d.foto foto, d.status status
				FROM kelompokkeahlian kk
				JOIN pengelola p
				JOIN dosen d
				WHERE p.id_pengelola='$id_pengelola'
				";
		$hasil=$this->db->query($sql);
		return $hasil->result_array();
	}

	public function get_all_data_pengelola()
	{
		$query = $this->db->get('pengelola');
		return $query->result_array();
	}

	public function get_profil_dosen($id_dosen)
	{
		$sql="SELECT d.id_dosen id_dosen, kk.id_kk id_kk, d.nama nama, d.nip nip, d.no_telp no_telp, d.username username, d.password password, d.email email, d.foto foto, d.status status, kk.namaKK namaKK
		FROM dosen d
		JOIN kelompokkeahlian kk on (d.id_kk=kk.id_kk)
		WHERE kk.id_kk <> 1 and d.id_dosen='$id_dosen'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function get_profil_pengelola($id_pengelola)
	{
		$sql="SELECT d.id_pengelola id_pengelola, kk.id_kk id_kk, d.nama nama, d.nip nip, d.no_telp no_telp, d.username username, d.password password, d.email email, d.foto foto, d.status status, kk.namaKK namaKK, count(ds.id_dosen) jml_anggota
		FROM pengelola d
		JOIN kelompokkeahlian kk on (d.id_kk=kk.id_kk)
		JOIN dosen ds on (ds.id_kk=kk.id_kk)
		WHERE kk.id_kk <> 1 and d.id_pengelola='$id_pengelola'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	/*public function get_profil_pengelola()
	{
		$sql="SELECT p.id_pengelola id_pengelola, kk.id_kk id_kk, p.nama nama, p.nip nip, p.no_telp no_telp, p.username username, p.password password, p.email email, p.foto foto, kk.namaKK namaKK
		FROM pengelola p
		JOIN kelompokkeahlian kk on (p.id_kk=kk.id_kk)";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}*/


	public function get_dosen_uname($uname)
	{
		$sql="SELECT d.id_dosen id_dosen, kk.id_kk id_kk, nama, nip, no_telp, username, password, email, foto, namaKK
		FROM dosen d
		JOIN kelompokkeahlian kk on (d.id_kk=kk.id_kk)
		WHERE username='".$uname."'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function get_pengelola_uname($uname)
	{
		$sql="SELECT p.id_pengelola id_pengelola, kk.id_kk id_kk, p.nama nama, p.nip nip, p.no_telp no_telp, p.username username, p.password password, p.email email, p.foto foto, kk.namaKK namaKK
		FROM pengelola p
		JOIN kelompokkeahlian kk on (p.id_kk=kk.id_kk)
		WHERE username='".$uname."'";
		$hasil=$this->db->query($sql);
		return $hasil->row(0,'array');
	}

	public function updateStatus($id_dosen,$data)
	{
		$this->db->where('id_dosen',$id_dosen);
		$this->db->update('dosen',$data);
	}

}