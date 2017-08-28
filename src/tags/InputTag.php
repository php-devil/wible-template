<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 29.08.2017
 * Time: 0:06
 */

namespace PhpDevil\Extensions\Wible\tags;


class InputTag extends AbstractTag
{
    protected $type;

    protected $value = '';

    protected $name;

    public function getOpenTag()
    {
        return '<input name="' . $this->name . '" type="' . $this->type. '" value="' . $this->value . '" placeholder="' . $this->placeholder . '"/>';
    }
}