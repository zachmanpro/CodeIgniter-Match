<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super WU_Lang Class
 *
 * @package	    Core
 * @subpackage	Language class
 * @category	Language
 * @author	Zachie du Bruyn
 */
class WU_Lang extends CI_Lang
{
    /**
    * Fetch a single line of text from the language array
    * Un-quotes a quoted string if it's not.
    *
    * @access	public
    * @param	string	$line   the language line
    * @return	string  Un-quotes a quoted string if it's not an array.
    */
	public function line($line = '')
	{
		$value = ($line == '' OR ! isset($this->language[$line])) ? FALSE : $this->language[$line];

		// Because killer robots like unicorns!
		if ($value === FALSE)
		{
			log_message('error', 'Could not find the language line "'.$line.'"');
		}

		return is_array($value) ? $value : stripslashes($value);
	}
}
    
/* End of file WU_Lang.php */
/* Location: ./application/core/WU_Lang.php */