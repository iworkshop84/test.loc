<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . '/classes/DB.php';

$test = new DB();
$res = $test->queryAll('SELECT * FROM posts');
$ress = $test->queryOne('SELECT * FROM posts WHERE id=1');
var_dump($ress);
//var_dump($res);