<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 28.08.2017
 * Time: 23:55
 */

namespace PhpDevil\Extensions\Wible\widgets;


abstract class AbstractWidget
{
    protected $_tag = null;

    /**
     * Класс внешнего тега
     * @return mixed
     */
    abstract public static function getOuterTagName();

    /**
     * Подготовка рендеринга виджета
     * @param $options
     * @return static
     */
    final public static function open($options = [])
    {
        return new static(array_merge(static::getDefaultOptions(), $options));
    }

    /**
     * Вывод виджета
     */
    final public function close()
    {
        echo $this->_tag->close();
    }

    final protected function __construct($options)
    {
        $tagName = static::getOuterTagName();
        $this->_tag = $tagName::open($options);
        return $this;
    }

    /**
     * Значения конфигурации виджетов по умолчанию
     * @return array
     */
    public static function getDefaultOptions()
    {
        return [];
    }
}