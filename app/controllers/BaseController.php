<?php

class BaseController extends Controller {

    function __construct() {
        $this->_defineUserClasses();
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    /**
     * Define user classes
     */
    private function _defineUserClasses() {
        define('UC_USER_DISABLED', 1);
        define('UC_USER_NOT_VERIFIED', 2);
        define('UC_USER', 3);
        define('UC_MODERATOR', 4);
        define('UC_OWNER', 5);
    }
}
