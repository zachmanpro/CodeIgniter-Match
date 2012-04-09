<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_example extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//ENVIRONMENT != 'development' || $this->output->enable_profiler(TRUE);
		$this->load->library('form_validation');
		$this->load->library('crud');

	}

	public function index()
	{
		redirect('examples/crud_example/question');
	}

	public function group()
	{
		$data = $this->crud->render();

		//dump($data);

		$this->load->view('crud/'.$data['action'], $data);
	}

	public function question()
	{
		$this->crud->set_model('examples/question');
		$data = $this->crud->render();

		//dump($data);

		$this->load->view('crud/'.$data['action'], $data);
	}

	public function product()
	{
		$data = $this->crud->render();
		$this->load->view('crud/'.$data['action'], $data);
	}

	public function two_primes()
	{
		$data = $this->crud->render();
		$this->load->view('crud/'.$data['action'], $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */