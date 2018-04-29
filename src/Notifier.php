<?php

namespace PavelGrancharov\TheEliteNotifier;

use PavelGrancharov\TheEliteNotifier\Controllers\RecordsController;
use PavelGrancharov\TheEliteNotifier\Controllers\UpdaterController;

class Notifier
{
	private $records = [];


	public function run()
	{
		$this->records = RecordsController::setRecords();
		UpdaterController::checkForChanges($this->records);
	}
}
