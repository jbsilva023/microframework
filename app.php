<?php

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$app = new JbSilva\App;
$app->setRenderer(new JbSilva\Rederer\PHPRenderer);

require __DIR__ . '/router.php';

$app->run();




