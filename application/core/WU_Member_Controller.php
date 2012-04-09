<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super WU_Member_Controller Class
 *
 * @package	Core
 * @subpackage	Controller
 * @category	Controllers
 * @author	Zachie du Bruyn
 */
class WU_Member_Controller extends WU_Controller
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
        $this->data['controller'] = 'member';
    }
}

/* End of file WU_Member_Controller.php */
/* Location: ./application/core/WU_Member_Controller.php */