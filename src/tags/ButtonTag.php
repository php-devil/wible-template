<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 29.08.2017
 * Time: 0:25
 */

namespace PhpDevil\Extensions\Wible\tags;

class ButtonTag extends AbstractTag
{
    protected $type;

    protected $caption;

    public function getOpenTag()
    {
        return '<button type="' . $this->type. '">';
    }

    public function label($label)
    {
        echo $label;
    }


    public function getCloseTag()
    {
        return '</button>';
    }
}