<?php

class Product_model extends CI_Model
{
    private $_table = 'tbl_minuman';
    private $_table_kategori = 'tbl_kategori';

    public function get()
    {

        $this->db->select('*');
        $this->db->from('tbl_minuman');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_minuman.id_kategori', 'left');
        $this->db->order_by('tbl_minuman.id_minuman', 'desc');
        return $this->db->get()->result();
        // $query = $this->db->get($this->_table);
        // return $query->result();
    }

    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_minuman');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_minuman.id_kategori', 'left');
        $this->db->where('id_minuman', $id);
        return $this->db->get()->row();
    }

    public function get_limit()
    {
        $this->db->select('*');
        $this->db->from('tbl_minuman');
        $this->db->limit(3);
        return $this->db->get();
    }

    public function find($id)
    {
        if (!$id) {
            return;
        }
        $query = $this->db->get_where($this->_table, array('id_minuman' => $id));
        return $query->row();
    }

    public function insert($product)
    {
        return $this->db->insert($this->_table, $product);
    }

    public function update($product)
    {
        if (!isset($product['id_minuman'])) {
            return;
        }

        return $this->db->update($this->_table, $product, ['id_minuman' => $product['id_minuman']]);
    }

    public function delete($id)
    {
        if (!$id) {
            return;
        }
        return $this->db->delete($this->_table, ['id_minuman' => $id]);
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }

    public function get_allkategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function get_product($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_minuman');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_minuman.id_kategori', 'left');
        $this->db->where('tbl_minuman.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }
}
