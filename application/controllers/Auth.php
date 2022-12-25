<?php

class Auth extends CI_Controller
{
    public function index()
    {
        show_404();
    }

    public function login()
    {
        $this->load->model('auth_model');
        $this->load->library('form_validation');

        // $rules = $this->auth_model->rules();
        // $this->form_validation->set_rules($rules);

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]', [
            'required' => 'Password harus diisi!',
            'max_length' => 'Password maksimal 255 karakter!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            return $this->load->view('login.php');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->auth_model->login($username, $password)) {
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('pesan', '<div class="exit-it alert alert-warning alert-dismissible fade show text-center" role="alert">
            Username atau Password Salah!
            </div>');

            redirect('auth/login');
        }
    }


    public function logout()
    {
        $this->load->model('auth_model');

        if ($this->auth_model->logout()) {
            $this->session->set_flashdata('');
        }
        $this->auth_model->logout();
        redirect(site_url('auth/login'));
    }
}
