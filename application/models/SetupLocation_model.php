<?php

class SetupLocation_model extends CI_Model
{
    private $_table = 'tbl_location';

    public function get()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    // public function get_aktif()
    // {
    //     $query = $this->db->get_where($this->_table, ['status' => 'true']);
    //     return $query->result();
    // }

    public function insert($setup)
    {
        return $this->db->insert($this->_table, $setup);
    }

    public function update($setup)
    {
        if (!isset($setup['id_location'])) {
            return;
        }

        return $this->db->update($this->_table, $setup, ['id_location' => $setup['id_location']]);
    }

    public function delete($id)
    {
        if (!$id) {
            return;
        }

        return $this->db->delete($this->_table, ['id_location' => $id]);
    }

    public function find($id)
    {
        if (!$id) {
            return;
        }

        $query = $this->db->get_where($this->_table, array('id_location' => $id));
        return $query->row();
    }
}
