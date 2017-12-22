<?php

function save(string $records): void
{
	$file = fopen('data/records.json', 'w+');

	fwrite($file, $records);
	fclose($file);
}
