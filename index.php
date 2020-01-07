<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/core/autoload.php';


$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$ctrollerClassName = $ctrl . 'Controller';

$controller = new $ctrollerClassName;
$method = 'action' . $act;

$controller->$method();
