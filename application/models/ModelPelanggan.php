<?php


class ModelPelanggan extends CI_Model {
	var $table = "pelanggan";
	var $primaryKey = "id_pelanggan";

	public function insert($data) {
		return $this->db->insert($this->table, $data);
	}

	public function insertGetId($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function getAll() {
		//hanya mengembalikan data yang is_active = 1
		$this->db->where("is_active", 1);
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id) {
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function update($id, $data) {
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	// delete data
	public function delete($id) {
		//hanya mengupdate is_active dari 1 menjadi 0
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, array("is_active" => 0));
	}

	function get_total_pelanggan(){
		return $this->db->query("SELECT count(id_pelanggan) as total FROM pelanggan")->row();
	}

	public function show($years = null, $month = null){
		$prefs = array(
		
		    'show_next_prev'  => TRUE,
		    'next_prev_url'   => base_url() . 'calendar/show/'
		);
		$this->load->library('calendar', $prefs);
		echo $this->calendar->generate($years, $month);
	}

	

}
