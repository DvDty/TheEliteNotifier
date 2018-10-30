<?php

namespace DvDty\TheEliteNotifier\Services;

class EmailService
{
	public static function send(array $records)
	{
		$TOs = [
			'dvdtygc@gmail.com',
		];

		$from = 'golden-eye@aluminabuild.com';

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From: ' . $from . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$subject = 'The Elite - new world records!';
		$message = '<h1>The Elite Notifier</h1><br><br>';

		foreach ($records as $r) {
			$message .= "<h2>" . $r['runner'] . "</h2>" . " just got ";
			$message .= "<a href='" . $r['url'] . "'>" . $r['time'] . "</a>" . " on " . $r['stage'];
			$message .= " (" . $r['level'] . ")!";
		}

		foreach ($TOs as $to) {
			mail($to, $subject, $message, $headers);
		}
	}

	public function sendException($message = ''): void
	{
		// todo;
	}
}
