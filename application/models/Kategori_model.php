<?php

class Kategori_model extends CI_Model
{
    private $_table = 'tbl_kategori';

    public function get()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function find($id)
    {
        if (!$id) {
            return;
        }

        $query = $this->db->get_where($this->_table, array('id_kategori' => $id));
        return $query->row();
    }

    public function insert($kategori)
    {
        return $this->db->insert($this->_table, $kategori);
    }

    public function update($kategori)
    {
        if (!isset($kategori['id_kategori'])) {
            return;
        }

        return $this->db->update($this->_table, $kategori, ['id_kategori' => $kategori['id_kategori']]);
    }

    public function delete($id)
    {
        if (!$id) {
            return;
        }

        return $this->db->delete($this->_table, ['id_kategori' => $id]);
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }
}
