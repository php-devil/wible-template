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