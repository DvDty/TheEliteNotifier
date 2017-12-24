<?php

function getRss(): string
{
    $rssUrl = "https://rankings.the-elite.net/ge-untieds.rss";
    $rssUrl = "http://localhost/goldeneye007-UWR-mailer/data/rss.txt";
    // TODO: remove backup link

    $rssData = file_get_contents($rssUrl);

    $rssData = explode(
        '<webMaster>ryandwyer1@gmail.com (Ryan Dwyer)</webMaster>',
        $rssData
    );

    $rssData = explode('</channel>', $rssData[1]);
    $rssData = $rssData[0];

    return $rssData;
}
