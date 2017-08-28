<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 28.08.2017
 * Time: 23:55
 */

namespace PhpDevil\Extensions\Wible\widgets;
use PhpDevil\Extensions\Wible\tags\ButtonTag;
use PhpDevil\Extensions\Wible\tags\FormTag;
use PhpDevil\Extensions\Wible\widgets\form\FormField;

/**
 * Виджет формы
 *
 * @package PhpDevil\Extensions\Wible\widgets
 */
class FormWidget extends AbstractWidget
{
    public static function getOuterTagName()
    {
        return FormTag::class;
    }

    public function field($name)
    {
        return new FormField($name);
    }

    public function button($label, $options = [])
    {
        return ButtonTag::open($options)->label($label);
    }
}