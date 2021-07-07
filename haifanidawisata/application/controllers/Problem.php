<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problem extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['link'] = 'Problem';
		$data['title'] = 'Page not Found';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('problem/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function blocked()
	{
		$data['link'] = 'Problem';
		$data['title'] = 'Access Denied';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('problem/blocked', $data);
		$this->load->view('templates/footer', $data);
	}

	public function comingSoon($soon = '2021/05/13')
	{
		$data['link'] = 'Problem';
		$data['title'] = 'Coming Soon';
		$data['soon'] = $soon;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('problem/coming-soon', $data);
		$this->load->view('templates/footer', $data);
	}
	public function maintenance($soon = '2021/05/13')
	{
		$data['link'] = 'Problem';
		$data['title'] = 'Maintenance';
		$data['soon'] = $soon;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('problem/maintenance', $data);
		$this->load->view('templates/footer', $data);
	}
	
}
