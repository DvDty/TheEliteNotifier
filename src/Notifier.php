<?php

class Notifier
{

	public function __construct()
	{
		$recordsController = new RecordsController();
		$recordsController->execute();
	}
}
