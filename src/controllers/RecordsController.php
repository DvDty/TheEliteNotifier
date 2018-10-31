<?php

final class RecordsController extends Controller
{
	private $liveRecords = [];
	private $savedRecords = [];
	private $newRecords = [];

	private $types = [
		'ge-untieds',
		//		'ge-wrs',
		//		'pd-untieds',
		//		'pd-wrs',
	];

	public const RSS_LIMIT    = 50;
	public const API_BASE_URL = 'https://rankings.the-elite.net/';


	public function execute(): void
	{
		$this->getNewRecords();
		$this->getOldRecords();

		$this->compareRecords();

		if ($this->newRecords) {
			$this->saveNewRecords();
			$this->notifyUsers();
		}
	}


	private function getNewRecords(): void
	{
		$records = [];

		foreach ($this->types as $type) {
			$records[$type] = $this->fetchRss($type);
		}

		$this->liveRecords = $records;
	}


	private function getOldRecords(): void
	{
		foreach ($this->types as $type) {
			$records = file_get_contents('src/resources/records/' . $type . '.json');
			$this->savedRecords[$type] = json_decode($records);
		}
	}


	private function fetchRss(string $type = 'ge-untieds'): array
	{
		$url = $this->getApiUrl($type);
		$rss = file_get_contents($url);

		$rss = str_replace('rnk:', '', $rss);

		if (!$rss) {
			$this->email->sendException('url is down');
			return [];
		}

		$std = simplexml_load_string($rss)->channel;

		return json_decode(json_encode($std))->item;
	}


	private function getApiUrl(string $type = 'ge-untieds', string $extension = 'rss'): string
	{
		return self::API_BASE_URL . $type . '.' . $extension;
	}


	private function compareRecords(): void
	{
		foreach ($this->types as $type) {
			for ($i = 0; $i < self::RSS_LIMIT; $i++) {
				if ($this->savedRecords[$type][0]->title !== $this->liveRecords[$type][$i]->title) {
					$this->newRecords[$type][] = $this->liveRecords[$type][$i];
					continue;
				}

				break;
			}
		}
	}


	private function saveNewRecords(): void
	{
		foreach ($this->types as $type) {
			if ($this->liveRecords[$type]) {
				$json = json_encode($this->liveRecords[$type]);

				if ($this->service->isProd()) {
					file_put_contents(__DIR__ . '/../resources/records/' . $type . '.json', $json);
				}
			}
		}
	}


	private function notifyUsers(): void
	{
		$this->email->sendRecordUpdates($this->newRecords);
	}
}
