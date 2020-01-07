<?php
include_once __DIR__ . '/../core/dbconfig.php';

class DB
{
    private $link;


    public function __construct() {
        $this->link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if (mysqli_connect_error()) {
            die('Ошибка подключения (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
    }
    protected function queryFunction($sql){
        return $this->link->query($sql);
    }

    public function queryAll($sql, $class = 'stdClass'){
        $queryresults = $this->link->query($sql);
        if(!$queryresults){
            return false;
        }
        $res = [];
        while($row = $queryresults->fetch_object($class)) {
            $res[] = $row;
        }
        return $res;
    }

    public function queryOne($sql, $class = 'stdClass'){
        return $this->queryAll($sql,$class)[0];
    }
}