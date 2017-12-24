<?php

/**
 * @param Record[] $records
 */
function notification(array $records): void
{
    $to = 'dvdtygc@gmail.com';
    $from = 'golden-eye@aluminabuild.com';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: ' . $from . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $subject = 'Untied world records update!';
    $message = 'The following updates have been made in the elite rank list:<br>';

    foreach ($records as $record) {
        $message .= $record->getTitle() . "<br>";
    }

    mail($to, $subject, $message, $headers);
}
