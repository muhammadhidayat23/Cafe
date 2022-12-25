<?php

class Merchandise_model extends CI_Model
{
    private $_table = 'tbl_merchandise';

    public function get()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function get_limit()
    {
        $this->db->select('*');
        $this->db->from('tbl_merchandise');
        $this->db->limit(2);
        return $this->db->get();
    }

    public function find($id)
    {
        if (!$id) {
            return;
        }

        $query = $this->db->get_where($this->_table, array('id_merchandise' => $id));
        return $query->row();
    }

    public function insert($merchandise)
    {
        return $this->db->insert($this->_table, $merchandise);
    }

    public function update($merchandise)
    {
        if (!isset($merchandise['id_merchandise'])) {
            return;
        }

        return $this->db->update($this->_table, $merchandise, ['id_merchandise' => $merchandise['id_merchandise']]);
    }

    public function delete($id)
    {
        if (!$id) {
            return;
        }
        return $this->db->delete($this->_table, ['id_merchandise' => $id]);
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }
}
