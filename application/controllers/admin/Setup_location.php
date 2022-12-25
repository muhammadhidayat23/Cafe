<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup_location extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setuplocation_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setups'] = $this->setuplocation_model->get();
        $this->template->load('template', 'setup_location.php', $data);
    }

    // SetUp Menu
    public function input_setup_location()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $title_1 = $this->input->post('title_1');
            $deskripsi_1 = $this->input->post('deskripsi_1');
            $hero_img_1 = $_FILES['hero_img_1']['name'];
            if ($hero_img_1 = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_1')) {
                    echo "hero_img_1 gagal diupload";
                } else {
                    $hero_img_1 = $this->upload->data('file_name');
                }
            }
            $deskripsi_2 = $this->input->post('deskripsi_2');
            $hero_img_2 = $_FILES['hero_img_2']['name'];
            if ($hero_img_2 = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_2')) {
                    echo "hero_img_2 gagal diupload";
                } else {
                    $hero_img_2 = $this->upload->data('file_name');
                }
            }
            $link_alamat = $this->input->post('link_alamat');

            $setup = array(
                'id_location' => $id,
                'title_1' => $title_1,
                'deskripsi_1' => $deskripsi_1,
                'hero_img_1' => $hero_img_1,
                'deskripsi_2' => $deskripsi_2,
                'hero_img_2' => $hero_img_2,
                'link_alamat' => $link_alamat
            );

            $saved = $this->setuplocation_model->insert($setup);

            if ($saved) {
                $this->session->set_flashdata('message', 'SetUp Berhasil Ditambahkan');
                return redirect('admin/setup_location');
            }
        }
        $this->template->load('template', 'form_setup_location.php', $data);
    }

    public function edit_setup_location($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setuplocation_model->find($id);

        if (!$data['setup'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $hero_img_1 = $_FILES['hero_img_1']['name'];
            if ($hero_img_1 = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_1')) {
                    // Kondisi edit data tanpa gambar1
                    $hero_img_2 = $_FILES['hero_img_2']['name'];
                    if ($hero_img_2 = '') {
                    } else {
                        $config['upload_path']          = FCPATH . '/upload/hero/';
                        $config['allowed_types']        = 'gif|jpg|jpeg|png';

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('hero_img_2')) {
                            $setup = [
                                'id_location' => $id,
                                'title_1' => $this->input->post('title_1'),
                                'deskripsi_1' => $this->input->post('deskripsi_1'),
                                'deskripsi_2' => $this->input->post('deskripsi_2'),
                                'link_alamat' => $this->input->post('link_alamat')
                            ];
                            $updated = $this->setuplocation_model->update($setup);
                            if ($updated) {
                                $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                                return redirect('admin/setup_location');
                            }
                        } else {
                            $hero_img_2 = $this->upload->data('file_name');
                            if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2)) {
                                unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2);
                            }
                        }
                        $setup = [
                            'id_location' => $id,
                            'title_1' => $this->input->post('title_1'),
                            'deskripsi_1' => $this->input->post('deskripsi_1'),
                            'deskripsi_2' => $this->input->post('deskripsi_2'),
                            'hero_img_2' => $hero_img_2,
                            'link_alamat' => $this->input->post('link_alamat')
                        ];
                        $updated = $this->setuplocation_model->update($setup);
                        if ($updated) {
                            $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                            return redirect('admin/setup_location');
                        }
                    }
                } else {
                    $hero_img_1 = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_1)) {
                        unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_1);
                    }
                }
            }

            $hero_img_2 = $_FILES['hero_img_2']['name'];
            if ($hero_img_2 = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_2')) {
                    $setup = [
                        'id_location' => $id,
                        'title_1' => $this->input->post('title_1'),
                        'deskripsi_1' => $this->input->post('deskripsi_1'),
                        'hero_img_1' => $hero_img_1,
                        'deskripsi_2' => $this->input->post('deskripsi_2'),
                        // 'hero_img_2' => $hero_img_2
                    ];
                    $updated = $this->setuplocation_model->update($setup);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                        return redirect('admin/setup_location');
                    }
                } else {
                    $hero_img_2 = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2)) {
                        unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2);
                    }
                }
                $setup = [
                    'id_location' => $id,
                    'title_1' => $this->input->post('title_1'),
                    'deskripsi_1' => $this->input->post('deskripsi_1'),
                    'hero_img_1' => $hero_img_1,
                    'deskripsi_2' => $this->input->post('deskripsi_2'),
                    'hero_img_2' => $hero_img_2
                ];
                $updated = $this->setuplocation_model->update($setup);
                if ($updated) {
                    $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                    return redirect('admin/setup_location');
                }
            }

            // TODO: lakukan validasi data seblum simpan ke model
            $setup = [
                'id_location' => $id,
                'title_1' => $this->input->post('title_1'),
                'deskripsi_1' => $this->input->post('deskripsi_1'),
                'hero_img_1' => $hero_img_1,
                'deskripsi_2' => $this->input->post('deskripsi_2'),
                'hero_img_2' => $hero_img_2
            ];
            $updated = $this->setuplocation_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                return redirect('admin/setup_location');
            }
        }

        $this->template->load('template', 'edit_setupLocation_form.php', $data);
    }

    public function edit_hero_story_1($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setuplocation_model->find($id);

        if (!$data['setup'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $hero_img_1 = $_FILES['hero_img_1']['name'];
            if ($hero_img_1 = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/hero/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('hero_img_1')) {
                    echo "Foto gagal diupload";
                } else {
                    $hero_img_1 = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_1)) {
                        unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_1);
                    }
                }
            }
            // TODO: lakukan validasi data seblum simpan ke model
            $setup = array(
                'id_location' => $id,
                'hero_img_1' => $hero_img_1
            );

            $updated = $this->setuplocation_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Hero Images Berhasil Diupdate');
                return redirect('admin/setup_location');
            }
        }
    }

    public function edit_hero_story_2($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setuplocation_model->find($id);

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
                'id_location' => $id,
                'hero_img_2' => $hero_img_2
            );

            $updated = $this->setuplocation_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Hero Images Section-2 Berhasil Diupdate');
                return redirect('admin/setup_location');
            }
        }
    }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->setuplocation_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'konten Pada Halaman Location Berhasil Dihapus');
            redirect('admin/setup_menu');
        }
    }
}
