<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup_story extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setupstory_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setups_story'] = $this->setupstory_model->get();
        $this->template->load('template', 'setup_story.php', $data);
    }

    // SetUp Home
    public function input_setup_story()
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
                    echo "Hero section 1 gagal diupload";
                } else {
                    $hero_img = $this->upload->data('file_name');
                }
            }

            $title_2 = $this->input->post('title_2');
            $deskripsi_2 = $this->input->post('deskripsi_2');
            $foto = $_FILES['hero_img_2']['name'];
            if ($hero_img_2 = '') {
            } else {
                $config['upload_path']      = FCPATH . '/upload/hero/';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_2')) {
                    echo "Hero Section ke-2 gagal diupload";
                } else {
                    $hero_img_2 = $this->upload->data('file_name');
                }
            }

            $title_3 = $this->input->post('title_3');
            $deskripsi_3 = $this->input->post('deskripsi_3');
            $foto = $_FILES['hero_img_3']['name'];
            if ($hero_img_3 = '') {
            } else {
                $config['upload_path']      = FCPATH . '/upload/hero/';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_3')) {
                    echo "Hero Section ke-3 gagal diupload";
                } else {
                    $hero_img_3 = $this->upload->data('file_name');
                }
            }

            $setup = array(
                'id' => $id,
                'title' => $title,
                'sub_title' => $sub_title,
                'hero_img' => $hero_img,
                'title_2' => $title_2,
                'deskripsi_2' => $deskripsi_2,
                'hero_img_2' => $hero_img_2,
                'title_3' => $title_3,
                'deskripsi_3' => $deskripsi_3,
                'hero_img_3' => $hero_img_3
            );

            $saved = $this->setupstory_model->insert($setup);

            if ($saved) {
                $this->session->set_flashdata('message', 'Setup Halaman Story Berhasil Ditambahkan');
                return redirect('admin/setup_story');
            }
        }
        $this->template->load('template', 'form_setup_story.php', $data);
    }

    public function edit_setup_story($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupstory_model->find($id);

        if (!$data['setup'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // TODO: lakukan validasi data seblum simpan ke model
            $setup = array(
                'id' => $id,
                'title' => $this->input->post('title'),
                'sub_title' => $this->input->post('sub_title'),
                'title_2' => $this->input->post('title_2'),
                'deskripsi_2' => $this->input->post('deskripsi_2'),
                'title_3' => $this->input->post('title_3'),
                'deskripsi_3' => $this->input->post('deskripsi_3'),
            );

            $updated = $this->setupstory_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Setup Halaman Story Berhasil diubah');
                return redirect('admin/setup_story');
            }
        }

        $this->template->load('template', 'edit_setupStroy_form.php', $data);
    }

    public function edit_hero_story($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupstory_model->find($id);

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
                    echo "Foto gagal diupload";
                } else {
                    $hero_img = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img)) {
                        unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img);
                    }
                }
            }
            // TODO: lakukan validasi data seblum simpan ke model
            $setup = array(
                'id' => $id,
                'hero_img' => $hero_img
            );

            $updated = $this->setupstory_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Hero Images Berhasil Diupdate');
                return redirect('admin/setup_story');
            }
        }
    }

    public function edit_hero_story_2($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupstory_model->find($id);

        if (!$data['setup'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $hero_img_2 = $_FILES['hero_img_2']['name'];
            if ($hero_img_2 = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_2')) {
                    echo "Foto gagal diupload";
                } else {
                    $hero_img_2 = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2)) {
                        unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2);
                    }
                }
            }
            // TODO: lakukan validasi data seblum simpan ke model
            $setup = array(
                'id' => $id,
                'hero_img_2' => $hero_img_2
            );

            $updated = $this->setupstory_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Hero Images Section-2 Berhasil Diupdate');
                return redirect('admin/setup_story');
            }
        }
    }

    public function edit_hero_story_3($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupstory_model->find($id);

        if (!$data['setup'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $hero_img_3 = $_FILES['hero_img_3']['name'];
            if ($hero_img_3 = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_3')) {
                    echo "Foto gagal diupload";
                } else {
                    $hero_img_3 = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_3)) {
                        unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_3);
                    }
                }
            }
            // TODO: lakukan validasi data seblum simpan ke model
            $setup = array(
                'id' => $id,
                'hero_img_3' => $hero_img_3
            );

            $updated = $this->setupstory_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Hero Images Section-3 Berhasil Diupdate');
                return redirect('admin/setup_story');
            }
        }
    }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->setupstory_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Konten Story Berhasil Dihapus');
            redirect('admin/setup_story');
        }
    }
}
