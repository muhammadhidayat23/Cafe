<?php

class Merchandise extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('merchandise_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['merchandises'] = $this->merchandise_model->get();
        $this->template->load('template', 'merchandise', $data);
    }

    public function add_merchandise()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['merchandise'] = $this->merchandise_model->get();

        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $nama_barang = $this->input->post('nama_barang');
            $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/merchandise/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['overwrite'] = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo "Foto gagal diupload";
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $merchandise = array(
                'id_merchandise' => $id,
                'nama_barang' => $nama_barang,
                'foto' => $foto,
            );

            $saved = $this->merchandise_model->insert($merchandise);

            if ($saved) {
                $this->session->set_flashdata('message', 'Produk Merchandise Berhasil Ditambahkan');
                return redirect('admin/merchandise');
            }
        }
        $this->template->load('template', 'merchandise_add_form.php', $data);
    }

    public function edit_merchandise($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['merchandise'] = $this->merchandise_model->find($id);

        if (!$data['merchandise'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/merchandise/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    // Kondisi edit data tanpa gambar
                    $merchandise = [
                        'id_merchandise' => $id,
                        'nama_barang' => $this->input->post('nama_barang'),
                    ];
                    $updated = $this->merchandise_model->update($merchandise);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Produk Merchandise Berhasil Diupdate');
                        return redirect('admin/merchandise');
                    }
                } else {
                    $foto = $this->upload->data('file_name');

                    if ($data['merchandise']->foto != '') {
                        unlink(FCPATH . '/upload/merchandise/' . $data['merchandise']->foto);
                    }
                }
            }

            // TODO: lakukan validasi data seblum simpan ke model
            // Edit data beserta gambar
            $merchandise = [
                'id_merchandise' => $id,
                'nama_barang' => $this->input->post('nama_barang'),
                'foto' => $foto,
            ];
            $updated = $this->merchandise_model->update($merchandise);
            if ($updated) {
                $this->session->set_flashdata('message', 'Produk Merchandise Berhasil Diupdate');
                return redirect('admin/merchandise');
            }
        }

        $this->template->load('template', 'merchandise_edit_form.php', $data);
    }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->merchandise_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Merchandise Berhasil Dihapus');
            redirect('admin/merchandise');
        }
    }
}
