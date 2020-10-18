<?php


class ModelTransaksi extends CI_Model
{
    public $table = "transaksi";
    public $primaryKey = "id_transaksi";

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function insertGetId($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getByPrimaryKey($id)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->get($this->table)->row();
    }

    public function update($id, $data)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, $data);
    }

    // delete data
    public function delete($id)
    {
        return $this->db->update($this->table, array("is_active" => 0));
    }

    public function get_total_transaksi()
    {
        return $this->db->query("SELECT count(id_transaksi) as total FROM transaksi")->row();
    }

    public function get_last_transaksi()
    {
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('transaksi.id_transaksi', "DESC");
		$this->db->limit(3, 0);
		$query = $this->db->get();
        return $query->result();
    }

    public function join_transaksi()
    {
        return $this->db->query("select * from transaksi join item_transaksi where transaksi.id_transaksi = item_transaksi.id_transaksi");
    }

    public function joinTableWhere($where)
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('item_transaksi i', 't.id_transaksi = i.id_transaksi');
        $this->db->join('nominal m', 'i.id_nominal = m.id_nominal');
        $this->db->where($where);
        $this->db->order_by('t.id_transaksi');
        return $this->db->get();
    }
}
