<?php

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

require __DIR__ . '/databese.php';

$app = new JbSilva\App;
$app->setRenderer(new JbSilva\Rederer\PHPRenderer);

require __DIR__ . '/router.php';

$app->run();




