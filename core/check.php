<?php

/**
 * @param Record[] $previous
 * @param Record[] $current
 * @return array
 */
function check($previous, $current)
{
    $newRecords = [];

    for ($i = 0; $i < count($previous); $i++) {
        if ($previous[0]->getTitle() != $current[$i]->getTitle()) {
            $newRecords[] = $current[$i];
        } else {
            break;
        }
    }

    return $newRecords;
}
