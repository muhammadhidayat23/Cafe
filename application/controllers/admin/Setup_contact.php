<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup_contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setupcontact_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setups'] = $this->setupcontact_model->get();
        $this->template->load('template', 'setup_contact.php', $data);
    }

    // SetUp Menu
    public function input_setup_contact()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $title = $this->input->post('title');
            $deskripsi = $this->input->post('deskripsi');
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

            $status = $this->input->post('status');

            $setup = array(
                'id_contact' => $id,
                'title' => $title,
                'deskripsi' => $deskripsi,
                'hero_img_1' => $hero_img_1,
                'hero_img_2' => $hero_img_2,
                'status' => $status
            );

            $saved = $this->setupcontact_model->insert($setup);

            if ($saved) {
                $this->session->set_flashdata('message', 'SetUp Halaman Contacts Berhasil Ditambahkan');
                return redirect('admin/setup_contact');
            }
        }
        $this->template->load('template', 'form_setup_contact.php', $data);
    }

    public function edit_setup_contact($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupcontact_model->find($id);

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
                                'id_contact' => $id,
                                'title' => $this->input->post('title'),
                                'deskripsi' => $this->input->post('deskripsi'),
                                'status' => $this->input->post('status')
                            ];
                            $updated = $this->setupcontact_model->update($setup);
                            if ($updated) {
                                $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                                return redirect('admin/setup_contact');
                            }
                        } else {
                            $hero_img_2 = $this->upload->data('file_name');
                            if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2)) {
                                unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2);
                            }
                        }

                        $setup = [
                            'id_contact' => $id,
                            'title' => $this->input->post('title'),
                            'deskripsi' => $this->input->post('deskripsi'),
                            'hero_img_2' => $hero_img_2,
                            'status' => $this->input->post('status')
                        ];
                        $updated = $this->setupcontact_model->update($setup);
                        if ($updated) {
                            $this->session->set_flashdata('message', 'Setup Halaman Contact Berhasil Diubah');
                            return redirect('admin/setup_contact');
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
                        'id_contact' => $id,
                        'title' => $this->input->post('title'),
                        'hero_img_1' => $hero_img_1,
                        'deskripsi' => $this->input->post('deskripsi'),
                        'status' => $this->input->post('status')
                    ];
                    $updated = $this->setupcontact_model->update($setup);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                        return redirect('admin/setup_contact');
                    }
                } else {
                    $hero_img_2 = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2)) {
                        unlink(FCPATH . '/upload/hero/' .  $data['setup']->hero_img_2);
                    }
                }

                $setup = [
                    'id_contact' => $id,
                    'title' => $this->input->post('title'),
                    'hero_img_1' => $hero_img_1,
                    'deskripsi' => $this->input->post('deskripsi'),
                    'hero_img_2' => $hero_img_2,
                    'status' => $this->input->post('status'),

                ];
                $updated = $this->setupcontact_model->update($setup);
                if ($updated) {
                    $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                    return redirect('admin/setup_contact');
                }
            }

            // TODO: lakukan validasi data seblum simpan ke model
            $setup = [
                'id_contact' => $id,
                'title' => $this->input->post('title'),
                'hero_img_1' => $hero_img_1,
                'deskripsi' => $this->input->post('deskripsi'),
                'hero_img_2' => $hero_img_2,
                'status' => $this->input->post('status'),
            ];
            $updated = $this->setupcontact_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Setup Halaman Locations Berhasil Diubah');
                return redirect('admin/setup_contact');
            }
        }

        $this->template->load('template', 'edit_setupContact_form.php', $data);
    }

    public function edit_hero_contact_1($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupcontact_model->find($id);

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
                'id_contact' => $id,
                'hero_img_1' => $hero_img_1
            );

            $updated = $this->setupcontact_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Hero Images-1 Berhasil Diupdate');
                return redirect('admin/setup_contact');
            }
        }
    }

    public function edit_hero_contact_2($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setupcontact_model->find($id);

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
                'id_contact' => $id,
                'hero_img_2' => $hero_img_2
            );

            $updated = $this->setupcontact_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Hero Images Section-2 Berhasil Diupdate');
                return redirect('admin/setup_contact');
            }
        }
    }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->setupcontact_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Konten Pada Halaman Contact Berhasil Dihapus');
            redirect('admin/setup_menu');
        }
    }
}
