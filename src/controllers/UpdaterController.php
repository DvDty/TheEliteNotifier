<?php

namespace PavelGrancharov\TheEliteNotifier\Controllers;

class UpdaterController
{
	public static function checkForChanges(array $worldRecords)
	{
		foreach ($worldRecords as $type => $records) {
			switch ($type) {
				case 'ge-uwr':
					self::calculateChanges($records, $type);
					break;
				case 'ge-wr':
					break;
				case 'pd-uwr':
					break;
				case 'pd-wr':
					break;
			}
		}
	}


	public static function saveChanges(array $records, string $type)
	{
		$records = json_encode($records);
		file_put_contents('src/static/records/' . $type . '.json', $records);
	}


	public static function sendEmails(array $records)
	{
		// Old Logic
		//$TOs = [
		//	'dvdtygc@gmail.com',
		//];

		//$from = 'golden-eye@aluminabuild.com';

		//$headers = 'MIME-Version: 1.0' . "\r\n";
		//$headers .= 'From: ' . $from . "\r\n";
		//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		//$subject = 'Untied world records update!';
		//$message = '<h1>The following updates have been made in the elite rank list:</h1><br><br>';

		//foreach ($records as $record) {
		//	$message .= $record->getTitle() . "<br>";
		//}

		//foreach ($TOs as $to) {
		//	mail($to, $subject, $message, $headers);
		//}
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

		if (count($newRecords)) {
			self::saveChanges($records, $type);
			self::sendEmails($newRecords);
		}
	}
}
