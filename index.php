<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/core/autoload.php';





$db = new DBmysqli();
$title = 'title';
$text = 'text';
$id = 1;
$class = 'News';
$query = "SELECT `title`, `text` FROM posts WHERE id=?";
//var_dump($query);die;
$res = $db->prepareExec($query, 'i', $id);
var_dump($res);







die;
$db = new DBmysqli();
$id='dsfdsf';

$query = "SELECT * FROM posts WHERE title='".$db->escapeStrForSimple($id). "' OR id=1";


$res = $db->simpleGetAll($query);
var_dump($res);







die;

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = !empty($_GET['act']) ? $_GET['act'] : 'All';


$ctrollerClassName = $ctrl . 'Controller';

$controller = new $ctrollerClassName;
$method = 'action' . $act;

$controller->$method();