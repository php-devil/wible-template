<?php
use PhpDevil\Extensions\Wible\tags\Form;
/**
 * @var \PhpDevil\Extensions\Wible\base\CView $this
 */
$this->extend(__DIR__ . '/layouts/body.php');
$this->title = 'Форма';

$this->beginBlock('content');

$form = Form::open(['method' => 'get']);



$form->close();

$this->endBlock();