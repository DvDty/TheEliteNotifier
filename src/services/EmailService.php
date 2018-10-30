<?php

namespace DvDty\TheEliteNotifier\Services;

use DvDty\TheEliteNotifier\Models\RssRecord;

class EmailService
{
	private $headers = [
		'MIME-Version: 1.0',
		'Content-Type: text/html; charset=ISO-8859-1',
	];

	private $receivers = [
		'dvdtygc@gmail.com',
	];

	private $from = 'golden-eye@aluminabuild.com';


	public function send(array $records = [])
	{
		foreach ($records as $types) {
			/** @var RssRecord $record */
			foreach ($types as $record) {
				$title = $this->createTitle($record->title);
				$message = $this->createMessage($record);

			foreach ($this->receivers as $receiver) {
				mail($receiver, $title, $message, $this->headers);
			}
		}
	}


	private function createTitle(string $title = ''): string
	{
		return 'TheEliteNotifier - ' . $title;
	}


	private function getTemplate(object $record): string
	{
		return '';
	}


	public function sendException($message = ''): void
	{
		// todo;
	}
}
