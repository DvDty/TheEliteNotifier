<?php

use DvDty\TheEliteNotifier\Controllers\EmailController;

abstract class Controller
{
	protected $email;

	public function __construct()
	{
		$this->email = new EmailController();
	}
}
