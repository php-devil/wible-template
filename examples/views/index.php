<?php
/**
 * @var \PhpDevil\Extensions\Wible\base\CView $this
 */
$this->extend(__DIR__ . '/layouts/body.php');
$this->title = 'Index template title';
?>

<?php $this->beginBlock('footer');?>
<?=__FILE__?> footer
<?php $this->endBlock(); ?>