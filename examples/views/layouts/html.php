<?php
/**
 * @var \PhpDevil\Extensions\Wible\base\CView $this
 */
$this->title = 'layouts/html.php';
?><!DOCTYPE HTML>
<html>
    <head>
        <title><?=$this->title?></title>
    </head>
    <body>
    <?php $this->beginBlock('body'); ?>

    <h1><?=$this->title?></h1>

    <?php $this->beginBlock('content'); ?>
    <p>Default body block of:</p>
    <p><?=__FILE__?></p>
        <footer>
        <hr/>
        <?=$this->beginBlock('footer');?>
        <?=__FILE__?> footer
        <?=$this->endBlock(); ?>
        </footer>
    <?php $this->endBlock();?>



    <?php $this->endBlock(); ?>
    </body>
</html>
