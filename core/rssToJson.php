<?php

function rssToJson($data)
{
	$removes = [
		'</item>',
		'</title>',
		'</link>',
		'</description>',
		'</pubDate>',
		'Untied: '
	];

	foreach ($removes as $remove) {
		$data = str_replace($remove, '', $data);
	}

	$items = explode('<item>', $data);
	array_shift($items);

	$records = [];

	foreach ($items as $item) {
		$title = trim(explode('<link>', explode('<title>', $item)[1])[0]);
		$url = trim(explode('<description>', explode('<link>', $item)[1])[0]);
		$description = trim(explode('<pubDate>', explode('<description>', $item)[1])[0]);
		$date = new DateTime(explode('<guid>', explode('<pubDate>', $item)[1])[0]);

		$record = new Record($title, $url, $description, $date);

		$records[] = [
			'title' => $record->getTitle(),
			'url' => $record->getUrl(),
			'description' => $record->getDescription(),
			'date' => $record->getDate()
		];
	}

	return json_encode($records);
}
