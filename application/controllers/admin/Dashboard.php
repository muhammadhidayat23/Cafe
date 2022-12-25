<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->load->model('product_model');
        $this->load->model('feedback_model');

        $data = [
            "current_user" => $this->auth_model->current_user(),
            "product_count" => $this->product_model->count(),
            "feedback_count" => $this->feedback_model->count()
        ];
        $this->template->load('template', 'dashboard_admin', $data);
    }
}
