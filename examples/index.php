<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$template = new \PhpDevil\Extensions\Wible\Wible();

$tplName = 'index';
if (isset($_GET['t']) && file_exists(__DIR__ . '/views/' . $_GET['t'] . '.php')) $tplName = $_GET['t'];
echo $template->render(__DIR__ . '/views/' . $tplName . '.php');