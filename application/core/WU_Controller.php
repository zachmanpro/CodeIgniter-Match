<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super WU_Controller Class
 *
 * @package	Core
 * @subpackage	Controller
 * @category	Controllers
 * @author	Zachie du Bruyn
 */
class WU_Controller extends CI_Controller
{
    #-> protected variables
    protected $user_data = array();
    protected $data = array();
    protected $fail_count = 0;

    /**
    * Constructor for class
    *
    * @access	public
    * @param	none
    */
    public function __construct()
    {
        parent::__construct();

        ENVIRONMENT != 'development' || $this->output->enable_profiler(TRUE);

        $this->_load_user();

        $this->config->load('menus', TRUE);

        $this->smarty->assign('base_url',base_url());

        if ($this->_is_member())
        {
            $this->data['user_name'] = $this->user_data['name'].' '.$this->user_data['surname'];
            $this->smarty->assign('user_name', $this->data['user_name']);
        }

        $this->load->helper('menu');
        $this->_load_menu();
        $this->smarty->assign('is_member',$this->_is_member());
    }


    /**
    * Method to load User's fail count
    *
    * @access	protected
    * @param	array @user_data
    */
    protected function _fail_count()
    {
        $this->load->model('user_log_model');
        $search = array(
            'ip'        =>  $this->input->ip_address(),
            'action'    =>  'LOGIN FAIL',
            'time >'    =>  date('Y-m-d H:i:s',now() - 3600)
        );
        return $this->user_log_model->get_count($search);
    }

    /**
    * Method to load User's details for session
    *
    * @access	protected
    * @param	array @user_data
    */
    protected function _load_user($user_data = false)
    {
        if ($user_data)
            $this->session->set_userdata(array('user_data' => $user_data));

        $session = $this->session->all_userdata();

        if (isset($session['user_data']))
        {
            $this->user_data = $session['user_data'];
        }

        if (isset($user_data['user_id']) && !empty($user_data['user_id']))
        {
            $this->user_model->save(array(
                'user_id'           => $user_data['user_id'],
                'last_login_date'   => date('Y-m-d H:i:s', now())
            ));
            $this->_load_menu();
            $this->data['user_name'] = $this->user_data['name'].' '.$this->user_data['surname'];
        }
    }


    /**
    * Method to load User's Menu options
    *
    * @access	protected
    * @return   none
    */
    protected function _load_menu()
    {
        $config = $this->config->item('menus');
        $menu = $config['menus'];

        if ($this->_is_admin())
        {
            $this->data['menu'] = $menu['admin'];
        }
        elseif ($this->_is_member())
        {
            $this->data['menu'] = $menu['member'];
        }
        else
        {
            $this->data['menu'] = $menu['public'];
        }
        $this->smarty->assign('menu', build_menu($this->data['menu']));
    }

    /**
    * Method to log User's Actions
    *
    * @access	protected
    * @param	string $action
    * @param    int $user_id (defualt = loged in user)
    * @return   int log_id
    */
    protected function _log_user_action($action, $user_id = FALSE)
    {
        $this->load->model('user_log_model');
        $log_action = array(
            'user_id' => $user_id !== FALSE ? $user_id : $this->user_data['user_id'],
            'action' => $action,
            'ip'    => $this->input->ip_address()
        );
        return $this->user_log_model->save($log_action);
    }


    /**
    * Method to check is_admin flag
    *
    * @access	public
    * @param	none
    * @return   bool
    */
    protected function _is_admin()
    {
        return isset($this->user_data['is_admin']) && $this->user_data['is_admin'];
    }

    /**
    * Method to check if loged in
    *
    * @access	public
    * @param	none
    * @return   bool
    */
    protected function _is_member()
    {
        return isset($this->user_data['user_id']) && $this->user_data['user_id'];
    }

    /**
    * Method to log out user and kill session
    *
    * @access	public
    * @param	none
    * @return   bool
    */
    protected function _log_out()
    {
        $this->session->sess_destroy();
        if (isset($this->user_data['user_id']))
        {
            $this->_log_user_action('LOGGED OUT', $this->user_data['user_id']);
        }
        $this->user_data = array();
        $this->_load_menu();
        return true;
    }

    /**
    * Method to set session value
    *
    * @access	public
    * @param	none
    * @return   bool
    */
    protected function _set_session_value($name, $value)
    {
        return $this->session->set_userdata(array($name => serialize($value)));
    }

    /**
    * Method to get session value
    *
    * @access	public
    * @param	none
    * @return   multi value
    */
    protected function _get_session_value($name, $default_value = false)
    {
        $value = unserialize($this->session->userdata($name));
        if (empty($value))
        {
            $value = $default_value;
        }
        return $value;
    }

}


/* End of file WU_Controller.php */
/* Location: ./application/core/WU_Controller.php */
