<?php

namespace PavelGrancharov\TheEliteNotifier\Controllers;

class RecordsController
{
	public static function setRecords()
	{
		$records = [
			'ge-uwr' => [],
			'ge-wr'  => [],
			'pd-uwr' => [],
			'pd-wr'  => []
		];
		$urls = [
			'ge-uwr' => 'https://rankings.the-elite.net/ge-untieds.rss',
			'ge-wr'  => 'https://rankings.the-elite.net/ge-wrs.rss',
			'pd-uwr' => 'https://rankings.the-elite.net/pd-untieds.rss',
			'pd-wr'  => 'https://rankings.the-elite.net/pd-wrs.rss'
		];

		foreach ($urls as $type => $url) {
			$feed = file_get_contents($url);
			$records[$type] = self::parseFeed($feed, $type);
		}

		return $records;
	}


	public static function parseFeed(string $feed, string $type)
	{
		$parserStart = '<webMaster>ryandwyer1@gmail.com (Ryan Dwyer)</webMaster>';
		$parserEnd = '</channel>';
		$removes = [
			'</item>',
			'</title>',
			'</link>',
			'</description>',
			'</pubDate>',
			'Untied: '
		];

		$xml = explode($parserEnd, explode($parserStart, $feed)[1])[0];

		foreach ($removes as $remove) {
			$xml = str_replace($remove, '', $xml);
		}

		$xmls = explode('<item>', $xml);
		array_shift($xmls);
		$records = [];

		foreach ($xmls as $xml) {
			$title = trim(explode('<link>', explode('<title>', $xml)[1])[0]);
			$title = explode(" - ", $title);
			$stage = $title[0];

			switch ($title[1]) {
				case 'A':
					$level = 'Agent';
					break;
				case 'SA':
					$level = 'Secret Agent';
					break;
				case '00A':
					$level = '00 Agent';
					break;
				default:
					$level = 'XML Parsing error';
					break;
			}

			$time = explode(' by ', $title[2])[0];
			$runner = explode(' by ', $title[2])[1];
			$url = trim(explode('<description>', explode('<link>', $xml)[1])[0]);
			$description = trim(explode('<pubDate>', explode('<description>', $xml)[1])[0]);
			$date = trim(explode('<guid>', explode('<pubDate>', $xml)[1])[0]);

			$records[] = [
				'type'        => $type,
				'stage'       => $stage,
				'level'       => $level,
				'time'        => $time,
				'runner'      => $runner,
				'url'         => $url,
				'description' => $description,
				'date'        => $date
			];
		}

		return $records;
	}
}
