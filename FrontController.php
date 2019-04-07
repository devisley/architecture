<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 06.04.2019
 * Time: 22:34
 */

require_once "UrlHandler.php";


abstract class FrontController
{
    public static function run($url) {
        $urlHandler = new UrlHandler();
        $urlHandler->setUrl($url);
        $urlObject = $urlHandler->getUrlObject();
        $className = ucfirst($urlObject->controller) . 'Controller';

        include($className . '.php');

        if (class_exists($className)) {
            $controller = new $className();
            $controller->process();
        }
    }

    abstract protected function process();

}

FrontController::run("https://mysite.local/my/myaction?id=1&lang=ru&sort=asc");