<?php

namespace DvDty\TheEliteNotifier;

use DvDty\TheEliteNotifier\Controllers\RecordsController;

class Notifier
{

	public function __construct()
	{
		$recordsController = new RecordsController();
		$recordsController->execute();
	}
}
