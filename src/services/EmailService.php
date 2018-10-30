<?php

namespace DvDty\TheEliteNotifier\Services;

use DvDty\TheEliteNotifier\Models\RssRecord;

class EmailService
{
	public const HEADERS = [
		'MIME-Version: 1.0',
		'Content-Type: text/html; charset=ISO-8859-1',
		'From: golden-eye@aluminadream.com',
	];

	private $receivers = [
		'dvdtygc@gmail.com',
	];

	public const SUPPORTED_VIDEO_SERVICES = [
		'youtube' => 'https://www.youtube.com/watch?v=',
	];


	public function sendRecordUpdates(array $records = []): void
	{
		foreach ($records as $types) {
			/** @var RssRecord $record */
			foreach ($types as $record) {
				$title = $this->createTitle($record->title);
				$message = $this->createMessage($record);

				foreach ($this->receivers as $receiver) {
					$this->send($receiver, $title, $message);
				}
			}
		}
	}


	private function send(string $receiver = '', string $title = '', string $message = '', array $headers = []): void
	{
		if (!$headers) {
			$headers = self::HEADERS;
		}

		mail($receiver, $title, $message, implode("\r\n", $headers));
	}


	private function createTitle(string $title = ''): string
	{
		return 'TheEliteNotifier - ' . $title;
	}


	private function createVideoLink(string $videoType = '', string $videoId = ''): string
	{
		if (!array_key_exists($videoType, self::SUPPORTED_VIDEO_SERVICES)) {
			return $videoType;
		}

		return self::SUPPORTED_VIDEO_SERVICES[$videoType] . $videoId;
	}


	private function getStageImage(string $stage = 'Dam', string $extension = 'jpg', string $mime = 'image/jpeg'): string
	{
		$image = file_get_contents(__DIR__ . '/../resources/images/stages/ge/' . $stage . '.' . $extension);
		return 'data:image/' . $mime . ';base64,' . base64_encode($image);
	}


	private function createMessage(object $record = NULL): string
	{
		if (NULL === $record) {
			return '';
		}

		return $this->getTemplate([
			'image'    => $this->getStageImage($record->stage),
			'name'     => $record->playerName,
			'nickname' => $record->playerAlias,
			'stage'    => $record->stage,
			'time'     => $record->timeHms,
			'system'   => $record->system,
			'comment'  => $record->comment,
			'link'     => $this->createVideoLink($record->videoType, $record->videoId),
		]);
	}


	private function getTemplate(array $params = []): string
	{
		$html = file_get_contents(__DIR__ . '/../resources/templates/record.html');

		foreach ($params as $key => $value) {
			if (!is_string($value)) {
				$value = '';
			}

			$html = str_replace('{{ ' . $key . ' }}', $value, $html);
		}

		return $html;
	}


	public function sendException(string $message = ''): void
	{
		$this->send($this->receivers[0], $this->createTitle('Something is not working correctly'), $message);
	}
}
