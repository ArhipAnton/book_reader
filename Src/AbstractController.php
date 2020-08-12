<?php


namespace Src;


abstract class AbstractController
{
    protected function show(string $view, array $arg = []): void
    {
        require (__DIR__) . "/../View/$view.php";
    }

    abstract function actionIndex($params = []);
}