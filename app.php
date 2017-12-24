<?php

include 'core/core.php';
include 'entity/Record.php';

$rss = getRss();
$currentRecords = rssToObjectsArray($rss);

$json = file_get_contents('data/records.json');
$previousRecords = jsonToObjectsArray($json);

$newRecords = check($previousRecords, $currentRecords);

if ($newRecords) {
    notification($newRecords);
}

save(rssToJson($rss));