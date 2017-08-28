<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 28.08.2017
 * Time: 23:35
 */

namespace PhpDevil\Extensions\Wible\tags;


class FormTag extends AbstractTag
{
    protected $action = '';

    protected $method = 'post';

    protected function getOpenTag()
    {
        return '<form action="' . $this->action . '" method="' . $this->method. '">';
    }

    protected function getCloseTag()
    {
        return '</form>';
    }

}