<?php

namespace PavelGrancharov\TheEliteNotifier;

use PavelGrancharov\TheEliteNotifier\Controllers\RecordsController as RecordsController;

class Notifier
{
	private $records = [];


	public function notify()
	{
		$this->records = RecordsController::setRecords();
	}
}
