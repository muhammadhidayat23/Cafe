<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setuphome_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->load->model('quote_model');
        $data['current_user'] = $this->auth_model->current_user();
        $data['setups'] = $this->setuphome_model->get();
        $data['quotes'] = $this->quote_model->get_quote();
        $this->template->load('template', 'setup.php', $data);
    }

    // SetUp Home
    public function input_setup_home()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Nama Perusahaan', 'required', [
            'required' => 'Nama Perusahaan harus diisi!'
        ]);

        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $title = $this->input->post('title');
            $sub_title = $this->input->post('sub_title');
            $hero_img = $_FILES['hero_img']['name'];
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

            $saved = $this->setuphome_model->insert($setup);

            if ($saved) {
                $this->session->set_flashdata('message', 'SetUp Berhasil Ditambahkan');
                return redirect('admin/setup_home');
            }
        }
        $this->template->load('template', 'form_setup_home.php', $data);
    }

    public function edit_setup_home($id = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['setup'] = $this->setuphome_model->find($id);

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
                    $updated = $this->setuphome_model->update($product);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Setup Home Berhasil Diupdate');
                        return redirect('admin/setup_home');
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
            $updated = $this->setuphome_model->update($setup);
            if ($updated) {
                $this->session->set_flashdata('message', 'Setup Home Berhasil Diupdate');
                return redirect('admin/setup_home');
            }
        }

        $this->template->load('template', 'edit_setupHome_form.php', $data);
    }

    public function delete($id = null)
    {
        if (!$id) {
            show_404();
        }

        $deleted = $this->setuphome_model->delete($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Produk Berhasil Dihapus');
            redirect('admin/setup_home');
        }
    }


    // Quote
    public function input_quote()
    {
        $this->load->model('quote_model');

        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {
            $id = uniqid('', true);
            $quote = $this->input->post('quote');
            $quote_img = $_FILES['quote_img']['name'];
            if ($quote_img = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/quote/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('quote_img')) {
                    echo "quote_img gagal diupload";
                } else {
                    $quote_img = $this->upload->data('file_name');
                }
            }
            $status = $this->input->post('status');

            $setup = array(
                'id_quote' => $id,
                'quote' => $quote,
                'quote_img' => $quote_img,
                'status' => $status
            );

            $saved = $this->quote_model->insert_quote($setup);

            if ($saved) {
                $this->session->set_flashdata('message', 'Quote Berhasil Ditambahkan');
                return redirect('admin/setup_home');
            }
        }
        $this->template->load('template', 'form_quote.php', $data);
    }

    public function edit_quote($id = null)
    {
        $this->load->model('quote_model');

        $data['current_user'] = $this->auth_model->current_user();
        $data['quote'] = $this->quote_model->find_quote($id);

        if (!$data['quote'] || !$id) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $quote_img = $_FILES['quote_img']['name'];
            if ($quote_img = '') {
            } else {
                $config['upload_path']          = FCPATH . '/upload/quote/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('quote_img')) {
                    // Kondisi edit data tanpa gambar
                    $quote = [
                        'id_quote' => $id,
                        'quote' => $this->input->post('quote'),
                        'status' => $this->input->post('status')
                    ];
                    $updated = $this->quote_model->update_quote($quote);
                    if ($updated) {
                        $this->session->set_flashdata('message', 'Quote Berhasil Diupdate');
                        return redirect('admin/setup_home');
                    }
                } else {
                    $quote_img = $this->upload->data('file_name');
                    if (file_exists(FCPATH . '/upload/quote/' . $data['quote']->quote_img)) {
                        unlink(FCPATH . '/upload/quote/' . $data['quote']->quote_img);
                    }
                }
            }

            $quote = [
                'id_quote' => $id,
                'quote' => $this->input->post('quote'),
                'quote_img' => $quote_img,
                'status' => $this->input->post('status')
            ];
            $updated = $this->quote_model->update_quote($quote);
            if ($updated) {
                $this->session->set_flashdata('message', 'Quote Berhasil Diupdate');
                return redirect('admin/setup_home');
            }
        }

        $this->template->load('template', 'edit_quote.php', $data);
    }

    public function delete_quote($id = null)
    {
        if (!$id) {
            show_404();
        }

        $this->load->model('quote_model');

        $deleted = $this->quote_model->delete_quote($id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Produk Berhasil Dihapus');
            redirect('admin/setup_home');
        }
    }
}
