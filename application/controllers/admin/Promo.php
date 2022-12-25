<?php

class Promo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('promo_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['promo'] = $this->promo_model->get();
        $this->template->load('template', 'promo', $data);
    }

    public function add_promo()
    {
        $data['current_user'] = $this->auth_model->current_user();

        $this->load->library('form_validation');

        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $title = $this->input->post('title');
            $deskripsi = $this->input->post('deskripsi');
            $masa_promo = $this->input->post('masa_promo');
            $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/promo/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo "Foto gagal diupload";
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
            $status = $this->input->post('status');

            $promo = array(
                'id_promo' => $id,
                'title' => $title,
                'deskripsi' => $deskripsi,
                'masa_promo' => $masa_promo,
                'foto' => $foto,
                'status' => $status
            );

            $saved = $this->promo_model->insert($promo);

            if ($saved) {
                $this->session->set_flashdata('message', 'Promo Berhasil Ditambahkan');
                return redirect('admin/promo');
            }
        }
        $this->template->load('template', 'promo_new_form.php', $data);
    }

    public function edit_promo($id = null)
    {
        $data['promo'] = $this->promo_model->find($id);
        $data['current_user'] = $this->auth_model->current_user();

        if (!$data['promo'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/promo/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    // Kondisi edit data tanpa gambar
                    $promo = [
                        'id_promo' => $id,
                        'title' => $this->input->post('title'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'masa_promo' => $this->input->post('masa_promo'),
                        'status' => $this->input->post('status')
                    ];
                    $updated = $this->promo_model->update($promo);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Data Promo Berhasil Diupdate');
                        return redirect('admin/promo');
                    }
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            // TODO: lakukan validasi data seblum simpan ke model
            // Edit data beserta gambar
            $promo = [
                'id_promo' => $id,
                'title' => $this->input->post('title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'masa_promo' => $this->input->post('masa_promo'),
                'foto' => $foto,
                'status' => $this->input->post('status')
            ];
            $updated = $this->promo_model->update($promo);
            if ($updated) {
                $this->session->set_flashdata('message', 'Data Promo Berhasil Diupdate');
                return redirect('admin/promo');
            }
        }

        $this->template->load('template', 'promo_edit_form.php', $data);
    }

    public function edit_foto_produk($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['product'] = $this->product_model->find($id);

        if (!$data['product'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/product/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo "Foto gagal diupload";
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
            // TODO: lakukan validasi data seblum simpan ke model
            $product = array(
                'id_minuman' => $id,
                'foto' => $foto
            );

            $updated = $this->product_model->update($product);
            if ($updated) {
                $this->session->set_flashdata('message', 'Foto Produk Berhasil Diupdate');
                return redirect('admin/product');
            }
        }

        $this->template->load('template', 'edit_foto_produk_form.php', $data);
    }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->promo_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Promo Berhasil Dihapus');
            redirect('admin/promo');
        }
    }
}
