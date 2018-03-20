<?php

namespace PavelGrancharov\TheEliteNotifier;

use PavelGrancharov\TheEliteNotifier\Controllers\RecordsController;
use PavelGrancharov\TheEliteNotifier\Controllers\UpdaterController;

class Notifier
{
	private $records = [];

	public function start()
	{
		$this->records = RecordsController::setRecords();
		UpdaterController::checkForChanges($this->records);
	}
}
