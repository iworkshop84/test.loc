<?php
error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once __DIR__ . '/core/autoload.php';


$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = !empty($_GET['act']) ? $_GET['act'] : 'All';


$ctrollerClassName = $ctrl . 'Controller';

$controller = new $ctrollerClassName;

try{
    $method = 'action' . $act;
    $controller->$method();
    }
    catch (Exception $e){

    $errLog = new ErrorLog();
    $errLog->code = $e->getCode();
    $errLog->message = $e->getMessage();
    $errLog->trace = $e->getTrace();
    $errLog->writeLog();

        $view = new View();
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