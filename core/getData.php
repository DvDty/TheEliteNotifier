<?php

function getData(): string
{
    $rssUrl = "https://rankings.the-elite.net/ge-untieds.rss";
    $rssData = file_get_contents($rssUrl);
    //TODO: rss to json

    $rssData = explode(
        '<webMaster>ryandwyer1@gmail.com (Ryan Dwyer)</webMaster>',
        $rssData
    );

    $rssData = explode('</channel>', $rssData[1]);
    $rssData = ($rssData[0]);

    return $rssData;
}
