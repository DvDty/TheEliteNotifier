<?php

namespace PavelGrancharov\TheEliteNotifier\Controllers;

class UpdaterController
{
	public static function checkForChanges(array $worldRecords)
	{
		foreach ($worldRecords as $type => $records) {
			self::calculateChanges($records, $type);
		}
	}


	public static function saveChanges(array $records, string $type)
	{
		$records = json_encode($records);
		file_put_contents('src/static/records/' . $type . '.json', $records);
	}


	public static function getOldRecords(string $type)
	{
		$old = file_get_contents('src/static/records/' . $type . '.json');
		return json_decode($old, true);
	}


	public static function calculateChanges(array $records, string $type)
	{
		$oldRecords = self::getOldRecords($type);
		$newRecords = [];

		for ($i = 0; $i < 50; $i++) {
			if ($oldRecords[0] != $records[$i]) {
				$newRecords[] = $records[$i];
			} else {
				break;
			}
		}

		if ($newRecords) {
			self::saveChanges($records, $type);
			EmailController::send($newRecords);
		}
	}
}
