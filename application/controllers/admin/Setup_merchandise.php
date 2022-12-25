<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup_merchandise extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setupmerchandise_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setups'] = $this->setupmerchandise_model->get();
        $this->template->load('template', 'setup_merchandise', $data);
    }

    // SetUp Home
    public function input_setup_merchandise()
    {
        $data['current_user'] = $this->auth_model->current_user();

        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $title = $this->input->post('title');
            $deskripsi = $this->input->post('deskripsi');
            $hero_img = $_FILES['hero_img']['name'];
            if ($hero_img = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/merchandise/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['overwrite'] = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img')) {
                    echo "hero_img gagal diupload";
                } else {
                    $hero_img = $this->upload->data('file_name');
                }
            }
            $status = $this->input->post('status');

            $setup = array(
                'id' => $id,
                'title' => $title,
                'deskripsi' => $deskripsi,
                'hero_img' => $hero_img,
                'status' => $status
            );

            $saved = $this->setupmerchandise_model->insert($setup);

            if ($saved) {
                $this->session->set_flashdata('message', 'SetUp Halaman Merchandise Berhasil Ditambahkan');
                return redirect('admin/setup_merchandise');
            }
        }
        $this->template->load('template', 'form_setup_merchandise.php', $data);
    }

    public function edit_setup_merchandise($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupmerchandise_model->find($id);

        if (!$data['setup'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $hero_img = $_FILES['hero_img']['name'];
            if ($hero_img = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/merchandise/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img')) {
                    // Kondisi edit data tanpa gambar
                    $product = [
                        'id' => $id,
                        'title' => $this->input->post('title'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'status' => $this->input->post('status')
                    ];
                    $updated = $this->setupmerchandise_model->update($product);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Setup Halaman Merchandise Berhasil Diupdate');
                        return redirect('admin/setup_merchandise');
                    }
                } else {
                    $hero_img = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/merchandise/' .  $data['setup']->hero_img)) {
                        unlink(FCPATH . '/upload/merchandise/' .  $data['setup']->hero_img);
                    }
                }
            }
            // TODO: lakukan validasi data seblum simpan ke model
            $setup = [
                'id' => $id,
                'title' => $this->input->post('title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'hero_img' => $hero_img,
                'status' => $this->input->post('status')
            ];
            $updated = $this->setupmerchandise_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Setup Halaman Merchandise Berhasil Diupdate');
                return redirect('admin/setup_merchandise');
            }
        }

        $this->template->load('template', 'edit_setupMerchandise_form.php', $data);
    }

    // public function edit_hero_home($id = null)
    // {
    //     $data['current_user'] = $this->auth_model->current_user();
    //     $data['setup'] = $this->setuphome_model->find($id);

    //     if (!$data['setup'] || !$id) {
    //         show_404();
    //     }

    //     if ($this->input->method() === 'post') {
    //         $foto = $_FILES['foto']['name'];
    //         if ($foto = '') {
    //         } else {
    //             $file_name = str_replace('.', '', $data['current_user']->id);
    //             $config['upload_path']          = FCPATH . '/upload/hero/';
    //             $config['allowed_types']        = 'gif|jpg|jpeg|png';
    //             $config['file_name']            = $file_name;
    //             $config['overwrite']            = true;
    //             $config['max_size']             = 5120; // 1MB

    //             $this->load->library('upload', $config);
    //             if (!$this->upload->do_upload('foto')) {
    //                 echo "Foto gagal diupload";
    //             } else {
    //                 $foto = $this->upload->data('file_name');
    //             }
    //         }
    //         // TODO: lakukan validasi data seblum simpan ke model
    //         $setup = array(
    //             'id' => $id,
    //             'hero_img' => $foto
    //         );

    //         $updated = $this->setuphome_model->update($setup);
    //         if ($updated) {
    //             $this->session->set_flashdata('message', 'Hero Images Berhasil Diupdate');
    //             return redirect('admin/setup_home');
    //         }
    //     }

    //     $this->template->load('template', 'edit_hero_form.php', $data);
    // }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->setupmerchandise_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Data Hero Halaman Merchandsie Berhasil Dihapus');
            redirect('admin/setup_merchandise');
        }
    }
}
