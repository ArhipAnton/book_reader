<?php

namespace Src;


class Router
{
    public static function delegateToController($url, $params): void
    {
        $url = explode('/', $url);
        $controller = self::getController($url[1] ?: 'list');
        $method = self::getMethod($controller, $url[2] ?: 'index');
        $controller->$method($params);
    }

    private static function getController($name): AbstractController
    {
        $className = 'Controller\\' . ucfirst($name) . 'Controller';
        if (class_exists($className)) {
            return new $className();
        }
        die('Error 404! page not found');
    }

    private static function getMethod(AbstractController $controller, $action): string
    {
        $methodName = 'action' . ucfirst($action);
        if (method_exists($controller, $methodName)) {
            return $methodName;
        }
        die('Error 404! page not found');
    }
}