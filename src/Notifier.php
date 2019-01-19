<?php

namespace Notifier;

use Notifier\Controllers\RecordsController;

class Notifier
{

	public function __construct()
	{
		$recordsController = new RecordsController();
		$recordsController->execute();
	}
}
