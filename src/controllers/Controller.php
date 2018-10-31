<?php

abstract class Controller
{
	protected $email;

	public function __construct()
	{
		$this->email = new EmailService();
	}
}
