<?php
/**
 * @var \PhpDevil\Extensions\Wible\base\CView $this
 */
$this->extend(__DIR__ . '/layouts/body.php');
$this->title = 'Index template title';
?>

<?=$this->beginBlock('footer');?>
<?=__FILE__?> footer
<?=$this->endBlock(); ?>