<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::findLimit(3);

include __DIR__ . '/template.php';
