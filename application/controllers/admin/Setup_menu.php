<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup_menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setupmenu_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setups'] = $this->setupmenu_model->get();
        $this->template->load('template', 'setup_menu.php', $data);
    }

    // SetUp Menu
    public function input_setup_menu()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $title = $this->input->post('title');
            $sub_title = $this->input->post('sub_title');
            $foto = $_FILES['hero_img']['name'];
            if ($hero_img = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

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
                'sub_title' => $sub_title,
                'hero_img' => $hero_img,
                'status' => $status
            );

            $saved = $this->setupmenu_model->insert($setup);

            if ($saved) {
                $this->session->set_flashdata('message', 'SetUp Berhasil Ditambahkan');
                return redirect('admin/setup_menu');
            }
        }
        $this->template->load('template', 'form_setup_menu.php', $data);
    }

    public function edit_setup_menu($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupmenu_model->find($id);

        if (!$data['setup'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $hero_img = $_FILES['hero_img']['name'];
            if ($hero_img = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img')) {
                    // Kondisi edit data tanpa gambar
                    $product = [
                        'id' => $id,
                        'title' => $this->input->post('title'),
                        'sub_title' => $this->input->post('sub_title'),
                        'status' => $this->input->post('status')
                    ];
                    $updated = $this->setupmenu_model->update($product);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Setup Hero Menu Berhasil Diupdate');
                        return redirect('admin/setup_menu');
                    }
                } else {
                    $hero_img = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img)) {
                        unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img);
                    }
                }
            }
            // TODO: lakukan validasi data seblum simpan ke model
            $setup = [
                'id' => $id,
                'title' => $this->input->post('title'),
                'sub_title' => $this->input->post('sub_title'),
                'hero_img' => $hero_img,
                'status' => $this->input->post('status')
            ];
            $updated = $this->setupmenu_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Setup Hero Menu Berhasil Diupdate');
                return redirect('admin/setup_menu');
            }
        }

        $this->template->load('template', 'edit_setupMenu_form.php', $data);
    }

    // public function edit_hero_menu($id = null)
    // {
    //     $data['current_user'] = $this->auth_model->current_user();
    //     $data['setup'] = $this->setupmenu_model->find($id);

    //     if (!$data['setup'] || !$id) {
    //         show_404();
    //     }

    //     if ($this->input->method() === 'post') {
    //         $foto = $_FILES['hero_img']['name'];
    //         if ($foto = '') {
    //         } else {
    //             $file_name = str_replace('.', '', $data['current_user']->id);
    //             $config['upload_path']          = FCPATH . '/upload/hero/';
    //             $config['allowed_types']        = 'gif|jpg|jpeg|png';
    //             $config['file_name']            = $file_name;
    //             $config['overwrite']            = true;
    //             $config['max_size']             = 5120; // 1MB

    //             $this->load->library('upload', $config);
    //             if (!$this->upload->do_upload('hero_img')) {
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

    //         $updated = $this->setupmenu_model->update($setup);
    //         if ($updated) {
    //             $this->session->set_flashdata('message', 'Hero Images Berhasil Diupdate');
    //             return redirect('admin/setup_menu');
    //         }
    //     }

    //     $this->template->load('template', 'edit_heroMenu_form.php', $data);
    // }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->setupmenu_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'konten Hero Menu Berhasil Dihapus');
            redirect('admin/setup_menu');
        }
    }
}
