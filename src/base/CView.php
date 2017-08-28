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
     * Блоки, определенные по пути наследований снизу вверх
     * @var array
     */
    private $_blocks = [];

    /**
     * Стек вложенных блоков в текущем представлении
     * @var array
     */
    private $_blockStack = [];

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

    /**
     * Начало контентного блока представления
     * @param $blockName
     */
    public function beginBlock($blockName)
    {
        array_push($this->_blockStack, $blockName);
        ob_start();
    }

    /**
     * Конец контентного блока представления
     */
    public function endBlock()
    {
        $blockName = array_pop($this->_blockStack);
        $blockContent = ob_get_clean();
        if (empty($this->_blockStack)) {
            if ($this->_ignoreExtensions || null === $this->_isExtensionOf) {
                $this->displayBlock($blockName, $blockContent);
            } else {
                $this->saveBlock($blockName, $blockContent);
            }
        } else{
            // это внутренний блок, выводим его без сохранения
            $this->displayBlock($blockName, $blockContent);
        }
    }

    /**
     * Сохранение блока, если контент блока не был определен ранее
     *
     * @param $name
     * @param $content
     */
    private function saveBlock($name, $content)
    {
        if (!isset($this->_blocks[$name])) {
            $this->_blocks[$name] = $content;
        }
    }

    /**
     * Отображение лока, если
     * - он вложен в другой блок
     * - это блок верхнего уровня представления, не имеющего родительского
     *
     * @param $name
     * @param $content
     */
    private function displayBlock($name, $content)
    {
        if (isset($this->_blocks[$name])) {
            echo trim($this->_blocks[$name]);
        } else {
            echo trim($content);
        }
    }

    /**
     * Рендеринг файла представления
     * @param $fileName
     * @return string
     */
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

    /**
     * CView constructor.
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->_source = $fileName;
    }
}