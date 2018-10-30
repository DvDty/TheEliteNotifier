<?php

namespace DvDty\TheEliteNotifier\Controllers;

final class RecordsController extends Controller
{

	public  function getRecords(): array
	{
		$records = [];

		$urls = [
			'ge-uwr' => 'https://rankings.the-elite.net/ge-untieds.rss',
			'ge-wr'  => 'https://rankings.the-elite.net/ge-wrs.rss',
			'pd-uwr' => 'https://rankings.the-elite.net/pd-untieds.rss',
			'pd-wr'  => 'https://rankings.the-elite.net/pd-wrs.rss'
		];

		foreach ($urls as $type => $url) {
			$records[$type] = $this->fetchRss($url);
		}

		return $records;
	}

	public function fetchRss($url = ''): array {
		$rss = file_get_contents($url);

		if (!$rss) {
			$this->email->sendException('url is down');
			return [];
		}

		$std = simplexml_load_string($rss)->channel;

		return json_decode(json_encode($std))->item;
	}
}
