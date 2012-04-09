<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super WU_Router Class - Custom Routing
 *
 * @package	Core
 * @subpackage	Router
 * @category	Routing
 * @author	Zachie du Bruyn
 */
class WU_Router extends CI_Router
{
	function __construct()
	{
		parent::__construct();
	}

    /**
    * New _validate_request to also read into more than one sub-folder
    *
    * @access	public
    * @param	none
    */
	function _validate_request($segments)
	{   
		if (file_exists(APPPATH.'controllers/'.$segments[0].EXT))
		{
			return $segments;
		}
        
		if (is_dir(APPPATH.'controllers/'.$segments[0]))
		{
			$this->set_directory($segments[0]);
			$segments = array_slice($segments, 1);

			while(count($segments) > 0 && is_dir(APPPATH.'controllers/'.$this->directory.$segments[0]))
			{
				// Set the directory and remove it from the segment array
                $this->set_directory($this->directory . $segments[0]);
                $segments = array_slice($segments, 1);
			}

			if (count($segments) > 0)
			{
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].EXT))
				{
					show_404($this->fetch_directory().$segments[0]);
				}
			}
			else
			{
				$this->set_class($this->default_controller);
				$this->set_method('index');

				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.EXT))
				{
					$this->directory = '';
					return array();
				}

			}
			return $segments;
		}
        
        if (($segments[0] != 'public') && file_exists(APPPATH.'controllers/public/'.$segments[0].EXT))
        {            
            array_unshift($segments,'public');   
            return self::_validate_request($segments);
        }
        
        show_404($segments[0]);
	}
}

/* End of file WU_Router.php */
/* Location: ./application/core/WU_Router.php */