<?php

function getData()
{
    $rssUrl = "https://rankings.the-elite.net/ge-untieds.rss";
    $rssData = file_get_contents($rssUrl);

    $rssData = explode(
        '<webMaster>ryandwyer1@gmail.com (Ryan Dwyer)</webMaster>',
        $rssData
    );

    $rssData = explode('</channel>', $rssData[1]);
    var_dump($rssData);
    //TODO: rss to json
}

getData();
