<?php

require 'vendor/autoload.php';

Src\Router::delegateToController($_SERVER['REDIRECT_URL'],$_GET);

