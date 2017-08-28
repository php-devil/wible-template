<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 29.08.2017
 * Time: 0:03
 */

namespace PhpDevil\Extensions\Wible\widgets\form;

use PhpDevil\Extensions\Wible\tags\InputTag;

/**
 * Поле формы
 * @package PhpDevil\Extensions\Wible\widgets\form
 */
class FormField
{
    protected $inputTag = InputTag::class;

    protected $tagOptions = [
        'type' => 'text',
        'value' => ''
    ];

    public function inputText($options = [])
    {
        $this->tagOptions = array_merge($this->tagOptions, $options);
        $this->inputTag = InputTag::class;
        return $this;
    }

    public function inputPassword($options = [])
    {
        $this->tagOptions = array_merge($this->tagOptions, $options);
        $this->tagOptions['type'] = 'password';
        $this->inputTag = InputTag::class;
        return $this;
    }

    public function __toString()
    {
        $tag = ($this->inputTag)::open($this->tagOptions);
        return (string) $tag->close();
    }

    public function __construct($name)
    {
        $this->tagOptions['name'] = $name;
    }
}