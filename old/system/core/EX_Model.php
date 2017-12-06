<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

/**
 * @package     EX_Framework
 * @author      Freetuts Dev Team
 * @email       ngthuc.com@gmail.com
 * @copyright   Copyright (c) 2015
 * @since       Version 1.0
 * @filesource  system/core/EX_Controller.php
 */
class EX_Model
{
	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}

}
