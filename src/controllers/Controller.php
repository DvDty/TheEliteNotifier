<?php

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
