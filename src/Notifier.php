<?php

namespace DvDty\TheEliteNotifier;

use DvDty\TheEliteNotifier\Controllers\RecordsController;

class Notifier
{
	private $records;

	public function run(): void
	{
		$this->records = (new RecordsController())->getRecords();

//		UpdaterController::checkForChanges($this->newRecords);
	}
}
