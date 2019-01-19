<?php

namespace Notifier\Controllers;

use Notifier\Services\EmailService;
use Notifier\Services\Service;

abstract class Controller
{

	protected $email;
	protected $service;


	public function __construct()
	{
		$this->email = new EmailService();
		$this->service = new Service();
	}
}
