<?php
error_reporting(E_ALL);

require_once __DIR__ . '/core/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? $pathParts[1] : 'News';
$act = !empty($pathParts[2]) ? $pathParts[2] : 'All';



try{

    $ctrollerClassName = 'App\\Controllers\\' . $ctrl;

    $controller = new $ctrollerClassName;
    $method = 'action' . $act;
    $controller->$method();



    }
catch (Exception $e){

    $errLog = new App\Classes\ErrorLog();
    $errLog->code = $e->getCode();
    $errLog->message = $e->getMessage();
    $errLog->trace = $e->getTrace();
    $errLog->writeLog();

        $view = new App\Classes\View();
        $view->message = $e->getMessage();

        switch ($errLog->code){
            case 1:
                header('HTTP/1.1 403 Not Found');
                break;
            case 2:
                header('HTTP/1.1 404 Not Found');
                break;
        }
        $view->display('/news/404.php');
    }