<?php

declare(strict_types=1);

$data = json_decode(file_get_contents('./data/ads.json'), true);

$inner = './view/list.php';
require './view/page.php';
