<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		ENVIRONMENT != 'development' || $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
        $this->load->library('form_validation');
        $columns = array(
                array('name' => 'test1', 'display_as' => 'Test 1', 'type' => 'input'),
                array('name' => 'test2', 'display_as' => 'Test 2', 'type' => 'texteditor'),
                array('name' => 'test3', 'display_as' => 'Test 3', 'type' => 'date'),
                array('name' => 'test4', 'display_as' => 'Test 4', 'type' => 'select',
                      'options' => array(
                                array('label' => 'Op 1', 'value' => '1'),
                                array('label' => 'Op 2', 'value' => '2'),
                                array('label' => 'Op 3', 'value' => '3'),
                                )
                     ),
                array('name' => 'test5', 'display_as' => 'Test 5', 'type' => 'multi_select',
                      'options' => array(
                                array('label' => 'Op 1', 'value' => '1'),
                                array('label' => 'Op 2', 'value' => '2'),
                                array('label' => 'Op 3', 'value' => '3'),
                                )
                     ),
                array('name' => 'test6', 'display_as' => 'Test 6', 'type' => 'hidden'),
            );

        $rows[] = array(
            'test1' => 'value 1',
            'test2' => 'value 2',
            'test3' => 'value 3'
        );
        $rows[] = array(
            'test1' => 'value 1',
            'test2' => 'value 2',
            'test3' => 'value 3'
        );
        $rows[] = array(
            'test1' => 'value 2',
            'test2' => 'value 3',
            'test3' => 'value 4'
        );
        $rows[] = array(
            'test1' => 'value 5',
            'test2' => 'value 6',
            'test3' => 'value 7'
        );


        $this->smarty->assign('columns', $columns);
        $this->smarty->assign('list', $rows);
        $this->smarty->view('crud/list.tpl');

        //$this->smarty->assign('fields', $columns);
        //$this->smarty->assign('list', $rows);
        //$this->load->view('crud/add');
	}

	public function test_table()
	{
		$this->load->model('examples/question');
		$data = $this->question->get_list();
		$fields = $this->question->get_fields();

        $this->smarty->assign('columns', $fields);
        $this->smarty->assign('list', $data);
        $this->smarty->view('crud/list.tpl');

	}

	public function test_segments()
	{
		dump($this->uri->segments);
		dump($this->router->method);
	}

	public function group()
	{
		$this->load->library('crud');
		$this->crud = new Crud_tree();
		$data = $this->crud->render();

		//dump($data);

		$this->load->view('crud/'.$data['action'], $data);
	}

	public function question()
	{
		$this->load->library('form_validation');
		$this->load->library('crud');

		$this->crud = new Crud_tree();
		$this->crud->set_model('examples/question');
		$data = $this->crud->render();

		//dump($data);

		$this->load->view('crud/'.$data['action'], $data);
	}

	public function product()
	{
		$this->load->library('form_validation');
		$this->load->library('crud');

		$this->crud = new Crud_tree();
		$data = $this->crud->render();

		$this->load->view('crud/'.$data['action'], $data);
	}

	public function two_primes()
	{
		$this->load->library('form_validation');
		$this->load->library('crud');

		$this->crud = new Crud_tree();
		$data = $this->crud->render();

		$this->load->view('crud/'.$data['action'], $data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */