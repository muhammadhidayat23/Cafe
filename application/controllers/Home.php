<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		$data['meta'] = [
			'title' => 'Seduhan Rindu',
		];

		$this->load->model('product_model');
		$this->load->model('setuphome_model');
		$this->load->model('setupstory_model');
		$this->load->model('setuplocation_model');
		$this->load->model('merchandise_model');
		$this->load->model('promo_model');
		$this->load->model('quote_model');

		$data = [
			"heros" => $this->setuphome_model->get_aktif(),
			"products" => $this->product_model->get_limit()->result(),
			"storys" => $this->setupstory_model->get(),
			"locations" => $this->setuplocation_model->get(),
			"merchandise" => $this->merchandise_model->get_limit()->result(),
			"promo" => $this->promo_model->get_aktif(),
			"quotes" => $this->quote_model->get_aktif(),
		];

		$this->home_template->load('home_template', 'home', $data);
	}

	public function story()
	{
		$data['meta'] = [
			'title' => 'Story',
		];

		$this->load->model('setupstory_model');
		$data['storys'] =  $this->setupstory_model->get();

		$this->home_template->load('home_template', 'pages/story', $data);
	}

	public function menu()
	{
		$data['meta'] = [
			'title' => 'Menu'
		];

		$this->load->model('product_model');
		$this->load->model('setupmenu_model');

		$data['products'] = $this->product_model->get();
		$data['setups'] = $this->setupmenu_model->get_aktif();
		$data['kategori'] = $this->product_model->get_allkategori();

		$this->home_template->load('home_template', 'pages/menu', $data);
	}

	public function kategori($id_kategori)
	{
		$data['meta'] = [
			'title' => 'Menu'
		];

		$this->load->model('product_model');
		$this->load->model('setupmenu_model');

		$data['setups'] = $this->setupmenu_model->get_aktif();
		$data['kategori'] = $this->product_model->get_allkategori();
		$data['products'] = $this->product_model->get_product($id_kategori);

		$this->home_template->load('home_template', 'pages/kategori', $data);
	}

	public function locations()
	{
		$data['meta'] = [
			'title' => 'Locations'
		];

		$this->load->model('setuplocation_model');

		$data['setups'] = $this->setuplocation_model->get();

		$this->home_template->load('home_template', 'pages/locations', $data);
	}

	public function merchandise()
	{
		$data['meta'] = [
			'title' => 'Merchandise'
		];

		$this->load->model('merchandise_model');
		$this->load->model('setupmerchandise_model');
		$data = [
			"heros" => $this->setupmerchandise_model->get_aktif(),
			"merchandises" => $this->merchandise_model->get(),
		];

		$this->home_template->load('home_template', 'pages/merchandise', $data);
	}

	public function contact()
	{
		$data['meta'] = [
			'title' => 'Contact Us'
		];

		$this->load->library('form_validation');
		$this->load->model('setupcontact_model');

		$data['contact'] = $this->setupcontact_model->get_aktif();

		if ($this->input->method() === 'post') {
			$this->load->model('feedback_model');

			$feedback = [
				'id' => uniqid('', true),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'pesan' => $this->input->post('pesan')
			];

			$feedback_save = $this->feedback_model->insert($feedback);

			if ($feedback_save) {
				return $this->home_template->load('home_template', 'pages/contact_thanks');
			}
		}

		// fungsi untuk me-load view contact.php
		$this->home_template->load('home_template', 'pages/contact', $data);
	}
}
