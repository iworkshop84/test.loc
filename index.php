<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/core/autoload.php';







$db = new DBmysqli();

$id='dsfdsf';

$query = "SELECT * FROM posts WHERE title='".$db->escapeStrForSimple($id). "'";


$res = $db->simpleGetOne($query);
var_dump($res);







die;

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = !empty($_GET['act']) ? $_GET['act'] : 'All';


$ctrollerClassName = $ctrl . 'Controller';

$controller = new $ctrollerClassName;
$method = 'action' . $act;

$controller->$method();





