<?php
/**
 * Created by PhpStorm.
 * User: aavol
 * Date: 28.08.2017
 * Time: 22:15
 */

namespace PhpDevil\Extensions\Wible\base;

/**
 * Представление
 *
 * @property string $title
 *
 * @package PhpDevil\Extensions\Wible\base
 */
class CView
{
    /**
     * Исходное имя файла представления
     * @var null
     */
    private $_source = null;

    /**
     * Переменные представления
     * @var null
     */
    private $_tplVariables = null;

    /**
     * Учитывать наследование шаблонов при построении представления
     * @var bool
     */
    private $_extensionsEnabled = true;

    /**
     * Представление, являющееся родительским по отношению к данному
     * @var null
     */
    private $_isExtensionOf = null;

    /**
     * Задать переменную представления
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (!isset($this->_tplVariables[$name]))
            $this->_tplVariables[$name] = $value;
    }

    /**
     * Задать переменную представления не зависимо от ее наличия в стеке
     * @param $name
     * @param $value
     */
    public function assign($name, $value)
    {
        $this->_tplVariables[$name] = $value;
    }

    /**
     * Получение значения переменной представления
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        if (isset($this->_tplVariables[$name])) {
            return $this->_tplVariables[$name];
        } else {
            return null;
        }
    }

    /**
     * Указание файла родительского представления, расширяемого данным
     * @param $view
     * @throws CViewNotFoundException
     */
    public function extend($view)
    {
        if ($this->_extensionsEnabled) {
            if (file_exists($view)) $this->_isExtensionOf = $view;
            else throw new CViewNotFoundException($view);
        }
    }

    private function fetchFile($fileName)
    {
        ob_start();
        include $fileName;
        return ob_get_clean();
    }


    /**
     * Рендер представления со включенным или выключенным наследованием
     * @param bool $extendingEnable
     * @return string
     */
    public function fetch($extendingEnable = true)
    {
        $this->_extensionsEnabled = $extendingEnable;
        $content = $this->fetchFile($this->_source);
        while (null !== $this->_isExtensionOf) {
            $source = $this->_isExtensionOf;
            $this->_isExtensionOf = null;
            $content = $this->fetchFile($source);
        }
        return $content;
    }

    public function __construct($fileName)
    {
        $this->_source = $fileName;
    }
}