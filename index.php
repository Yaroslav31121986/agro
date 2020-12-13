<?php

require_once realpath('vendor/autoload.php');

use App\Router\Router;

Router::route('/', [App\Controller\MainController::class, 'index']);

Router::route('/ajax', [App\Controller\MainController::class, 'ajax']);

Router::execute($_SERVER['REQUEST_URI']);