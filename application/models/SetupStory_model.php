<?php

class SetupStory_model extends CI_Model
{
    private $_table = 'setup_story';

    public function get()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function insert($setup)
    {
        return $this->db->insert($this->_table, $setup);
    }

    public function update($setup)
    {
        if (!isset($setup['id'])) {
            return;
        }

        return $this->db->update($this->_table, $setup, ['id' => $setup['id']]);
    }

    public function delete($id)
    {
        if (!$id) {
            return;
        }

        return $this->db->delete($this->_table, ['id' => $id]);
    }

    public function find($id)
    {
        if (!$id) {
            return;
        }

        $query = $this->db->get_where($this->_table, array('id' => $id));
        return $query->row();
    }
}
