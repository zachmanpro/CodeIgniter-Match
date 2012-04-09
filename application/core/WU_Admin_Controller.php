<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super WU_Admin_Controller Class
 *
 * @package	    Core
 * @subpackage	Admin Controller
 * @category	Controllers
 * @author	Zachie du Bruyn
 */
class WU_Admin_Controller extends WU_Controller
{
    /**
    * Constructor for class
    *
    * @access	public
    * @param	none
    */
    public function __construct()
    {
        parent::__construct();
		
        if (!$this->_is_admin())
		{
			//redirect('');
		}
        
        $this->smarty->assign('controller','admin');
    }
}

/* End of file WU_Admin_Controller.php */
/* Location: ./application/core/WU_Admin_Controller.php */