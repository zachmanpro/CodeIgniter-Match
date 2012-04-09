<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super WU_Public_Controller Class
 *
 * @package	Core
 * @subpackage	Controller
 * @category	Controllers
 * @author	Zachie du Bruyn
 */
class WU_Public_Controller extends WU_Controller
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
        $this->data['controller'] = 'public';
    }
}

/* End of file WU_Public_Controller.php */
/* Location: ./application/core/WU_Public_Controller.php */