<?php

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->load->model('kategori_model');

        $data['current_user'] = $this->auth_model->current_user();
        $data['kategoris'] = $this->kategori_model->get();

        $this->template->load('template', 'kategori', $data);
    }

    public function add_kategori()
    {
        $this->load->model('kategori_model');
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $nama_kategori = $this->input->post('nama_kategori');

            $kategori = array(
                'id_kategori' => $id,
                'nama_kategori' => $nama_kategori,
            );

            $saved = $this->kategori_model->insert($kategori);

            if ($saved) {
                $this->session->set_flashdata('message', 'Kategori Berhasil Ditambahkan');
                return redirect('admin/kategori');
            }
        }
        $this->template->load('template', 'kategori_new_form.php', $data);
    }

    public function edit_kategori($id)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['kategori'] = $this->kategori_model->find($id);

        if (!$data['kategori'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // TODO: lakukan validasi data seblum simpan ke model
            $kategori = [
                'id_kategori' => $id,
                'nama_kategori' => $this->input->post('nama_kategori'),
            ];
            $updated = $this->kategori_model->update($kategori);
            if ($updated) {
                $this->session->set_flashdata('message', 'Kategori Berhasil Diupdate');
                return redirect('admin/kategori');
            }
        }

        $this->template->load('template', 'kategori_edit_form.php', $data);
    }

    public function delete($id)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->kategori_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Kategori Berhasil Dihapus');
            redirect('admin/kategori');
        }
    }
}
