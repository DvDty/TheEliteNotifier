<?php

namespace PavelGrancharov\TheEliteNotifier\Controllers;

class ConverterController
{
	private $feed = [
		'ge-uwr' => '',
		'ge-wr'  => '',
		'pd-uwr' => '',
		'pd-wr'  => ''
	];
	private $data = [
		'xml'     => '',
		'json'    => '',
		'objects' => []
	];
	private $urls = [
		'ge-uwr' => 'https://rankings.the-elite.net/ge-untieds.rss',
		'ge-wr'  => 'https://rankings.the-elite.net/ge-wrs.rss',
		'pd-uwr' => 'https://rankings.the-elite.net/pd-untieds.rss',
		'pd-wr'  => 'https://rankings.the-elite.net/pd-wrs.rss'
	];

	public function getFeed()
	{

	}

	public function parseFeed(string $feed)
	{

	}

	public function toJson(string $feed)
	{

	}

	// json to objects
}
