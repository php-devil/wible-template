<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 28.08.2017
 * Time: 23:36
 */

namespace PhpDevil\Extensions\Wible\tags;


abstract class AbstractTag
{
    abstract protected function getOpenTag();

    protected $placeholder = null;

    protected function getCloseTag()
    {
        return null;
    }


    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (method_exists($this, $method)) $this->$method($value);
        else throw new InvalidTagPropertyException('Invalid param ' . $name . ' of tag ' . get_class($this));
    }

    final protected function __construct($options = [])
    {
        if (!empty($options)) foreach ($options as $k=>$v) {
            $this->$k = $v;
        }
        ob_start();
        echo $this->getOpenTag();
    }

    final public static function open($options = [])
    {
        return new static($options);
    }

    public function __toString()
    {
        return (string) $this->close();
    }

    final public function close()
    {
        echo $this->getCloseTag();
        echo ob_get_clean();
    }
}