<?php
use PhpDevil\Extensions\Wible\tags\Form;
/**
 * @var \PhpDevil\Extensions\Wible\base\CView $this
 */
$this->extend(__DIR__ . '/layouts/body.php');
$this->title = 'Форма';

$this->beginBlock('content');

$form = \PhpDevil\Extensions\Wible\widgets\FormWidget::open();
echo $form->field('username')->inputText(['placeholder' => 'Имя пользователя']);
echo $form->field('password')->inputPassword(['placeholder' => 'Пароль']);
echo $form->button('Войти', ['type'=>'submit']);
$form->close();

$this->endBlock();