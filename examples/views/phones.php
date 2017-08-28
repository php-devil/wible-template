<?php
use PhpDevil\Extensions\Wible\Wible;
/**
 * @var \PhpDevil\Extensions\Wible\base\CView $this
 */
$this->extend(__DIR__ . '/layouts/body.php');
$this->beginBlock('content');
$this->title = 'Модификаторы номеров телефонов';

$source = [
    '+7 (999) 123-45-67',
    '8 800 123-45-67',
    '7 &lt;span&gt; 495&lt;/span&gt;  123-45-67',
    'this7is495a123-45-67test',
];
?>
<pre>
    &lt;php
       echo Wible::modify($phone, 'phone', '+#&amp;nbsp;(###)&amp;nbsp;###&amp;nbsp;&amp;ndash;&amp;nbsp;##&amp;nbsp;&amp;ndash;&amp;nbsp;##');
</pre>
<table style="border-collapse: collapse" border="1">
    <tr>
        <td>Входные данные</td>
        <td>После модификации</td>
    </tr>
    <?php foreach ($source as $phone): ?>
    <tr>
        <td><?=$phone?></td>
        <td><?=Wible::modify($phone, 'phone', '+#&nbsp;(###)&nbsp;###&nbsp;&ndash;&nbsp;##&nbsp;&ndash;&nbsp;##')?></td>
    </tr>
    <?php endforeach; ?>
</table>


<?php
$this->endBlock();
