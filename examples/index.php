<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$template = new \PhpDevil\Extensions\Wible\Wible();

echo $template->render(__DIR__ . '/views/index.php');