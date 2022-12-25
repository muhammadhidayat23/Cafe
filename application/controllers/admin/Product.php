<?php

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->model('product_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['products'] = $this->product_model->get();
        $this->template->load('template', 'product', $data);
    }

    public function new_product()
    {
        $this->load->model('kategori_model');
        $data['current_user'] = $this->auth_model->current_user();
        $data['kategoris'] = $this->kategori_model->get();
        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $nama_minuman = $this->input->post('nama_minuman');
            $deskripsi = $this->input->post('deskripsi');
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
            $kategori = $this->input->post('id_kategori');

            $product = array(
                'id_minuman' => $id,
                'nama_minuman' => $nama_minuman,
                'deskripsi' => $deskripsi,
                'foto' => $foto,
                'id_kategori' => $kategori
            );

            $saved = $this->product_model->insert($product);

            if ($saved) {
                $this->session->set_flashdata('message', 'Produk Berhasil Ditambahkan');
                return redirect('admin/product');
            }
        }
        $this->template->load('template', 'product_new_form.php', $data);
    }

    public function edit_product($id = null)
    {
        $data['kategoris'] = $this->kategori_model->get();
        $data['product'] = $this->product_model->get_data($id);
        $data['current_user'] = $this->auth_model->current_user();

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
                    // Kondisi edit data tanpa gambar
                    $product = [
                        'id_minuman' => $id,
                        'nama_minuman' => $this->input->post('nama_minuman'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'id_kategori' => $this->input->post('id_kategori')
                    ];
                    $updated = $this->product_model->update($product);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Produk Berhasil Diupdate');
                        return redirect('admin/product');
                    }
                } else {
                    $foto = $this->upload->data('file_name');

                    if (file_exists(FCPATH . '/upload/product/' . $data['product']->foto)) {
                        unlink(FCPATH . '/upload/product/' . $data['product']->foto);
                    }
                }
            }

            // TODO: lakukan validasi data seblum simpan ke model
            // Edit data beserta gambar
            $product = [
                'id_minuman' => $id,
                'nama_minuman' => $this->input->post('nama_minuman'),
                'deskripsi' => $this->input->post('deskripsi'),
                'foto' => $foto,
                'id_kategori' => $this->input->post('id_kategori')
            ];
            $updated = $this->product_model->update($product);
            if ($updated) {
                $this->session->set_flashdata('message', 'Produk Berhasil Diupdate');
                return redirect('admin/product');
            }
        }

        $this->template->load('template', 'product_edit_form.php', $data);
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
                    if (FCPATH . '/upload/product/' . $data['product']->foto) {
                        unlink(FCPATH . '/upload/product/' . $data['product']->foto);
                    }
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
        $data['product'] = $this->product_model->get_data($id);

        if (!$id) {
            show_404();
        }

        if (file_exists(FCPATH . '/upload/product/' . $data['product']->foto)) {
            unlink(FCPATH . '/upload/product/' . $data['product']->foto);
        }

        $deleted = $this->product_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Produk Berhasil Dihapus');
            redirect('admin/product');
        }
    }
}
