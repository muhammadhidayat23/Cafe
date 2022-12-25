<?php

class Quote_model extends CI_Model
{
    private $_table = 'tbl_quote';

    public function get_quote()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function get_aktif()
    {
        $query = $this->db->get_where($this->_table, ['status' => 'true']);
        return $query->result();
    }

    public function insert_quote($setup)
    {
        return $this->db->insert($this->_table, $setup);
    }

    public function update_quote($setup)
    {
        if (!isset($setup['id_quote'])) {
            return;
        }

        return $this->db->update($this->_table, $setup, ['id_quote' => $setup['id_quote']]);
    }

    public function delete_quote($id)
    {
        if (!$id) {
            return;
        }

        return $this->db->delete($this->_table, ['id_quote' => $id]);
    }

    public function find_quote($id)
    {
        if (!$id) {
            return;
        }

        $query = $this->db->get_where($this->_table, array('id_quote' => $id));
        return $query->row();
    }
}
