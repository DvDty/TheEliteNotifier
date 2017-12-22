<?php

include 'core/core.php';
include 'entity/Record.php';

$data = getData();
$records = convert($data);

save($records);