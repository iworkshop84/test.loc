<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/core/autoload.php';


$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = !empty($_GET['act']) ? $_GET['act'] : 'All';


$ctrollerClassName = $ctrl . 'Controller';

$controller = new $ctrollerClassName;

try{
    $method = 'action' . $act;
    $controller->$method();
    }catch (Exception $e){

       $view = new View();
       $view->code = $e->getCode();
       $view->message = $e->getMessage();

       //$view->getPrevios = $e->getPrevious();
        switch ($view->code){
            case 1:
                header('HTTP/1.1 403 Not Found');
                break;
            case 2:
                header('HTTP/1.1 404 Not Found');
                break;
        }

        $view->display('/news/404.php');

}