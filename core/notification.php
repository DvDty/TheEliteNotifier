<?php

function notification(string $subject = '', string $message = ''): void
{
    $to = 'dvdtygc@gmail.com';
    $from = 'golden-eye@aluminabuild.com';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: ' . $from . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $mail = mail($to, $subject, $message, $headers);

    if (!$mail) {
        //TODO: log
    }
}
