<?php
namespace PhpDevil\Extensions\Wible;
use PhpDevil\Extensions\Wible\base\CView;

/**
 * Фронт-контроллер шаблонизатора
 *
 * @package PhpDevil\Extensions\Wible
 */
class Wible
{
    /**
     * Загрузка модификатора данных
     * @param $name
     * @return null|string
     */
    private static function getModifier($name)
    {
        $class = 'PhpDevil\\Extensions\\Wible\\modifiers\\' . ucfirst($name) . 'Modifier';
        if (class_exists($class)) {
            return $class;
        } else {
            return null;
        }
    }

    /**
     * Модификация данных
     * @param $value
     * @param $modifier
     * @param $param
     * @return string|null
     */
    public static function modify($value, $modifier, $param)
    {
        if ($modifierClassName = self::getModifier($modifier)) {
            return $modifierClassName::modify($value, $param);
        }
    }

    /**
     * Отображение шаблона
     *
     * @param $templatePath
     * @return string
     */
    public function render($templatePath)
    {
        if (file_exists($templatePath)) {
            return (new CView($templatePath))->fetch();
        }
    }

    public function __construct()
    {

    }
}