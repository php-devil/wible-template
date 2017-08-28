<?php
/**
 * @var \PhpDevil\Extensions\Wible\base\CView $this
 */

$this->extend(__DIR__ . '/html.php');

$this->title = 'layouts/body.php';

$this->beginBlock('content'); ?>
    <p>Default body block of:</p>
    <p><?=__FILE__?></p>
    <footer>
        <hr/>
        <?=$this->beginBlock('footer');?>
        <?=__FILE__?> footer
        <?=$this->endBlock(); ?>
    </footer>
<?php
$this->endBlock();