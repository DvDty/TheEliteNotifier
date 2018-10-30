<?php

namespace DvDty\TheEliteNotifier\Controllers;

use DvDty\TheEliteNotifier\Services\EmailService;

abstract class Controller
{
	protected $email;

	public function __construct()
	{
		$this->email = new EmailController();
	}
}
