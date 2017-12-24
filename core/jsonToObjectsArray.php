<?php

function jsonToObjectsArray($json)
{
    $records = [];

    foreach (json_decode($json, true) as $element) {
        $records[] = new Record(
            $element['title'],
            $element['url'],
            $element['description'],
            new DateTime($element['date']['date'] . ' ' . $element['date']['timezone'])
        );
    }

    return $records;
}
