<?php

//include '../entity/Record.php';

function convert($data)
{
    $removes = [
        '</item>',
        '</title>',
        '</link>',
        '</description>',
        '</pubDate>'
    ];

    foreach ($removes as $remove) {
        $data = str_replace($remove, '', $data);
    }

    $items = explode('<item>', $data);
    array_shift($items);

    foreach ($items as $item) {
        echo $item;
        //TODO: finish
    }
}
