<?php
include_once __DIR__ . '/../core/dbconfig.php';

class DBmysqli
{
    private $dbh = null;
    private $stmt = null;
    private $className = 'stdClass';

    public function setClassName($className){
        $this->className = $className;
    }


    public function __construct()
    {
        $this->dbh = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($this->dbh->connect_error) {
            die('Ошибка подключения (' . $this->dbh->connect_errno . ') '
                . $this->dbh->connect_error);
        }
        // Старый вариант вызова ошибок, процедурный стиль
        // if (mysqli_connect_error()) {
        // die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        // }
    }

    public function escapeStrForSimple($arg){
        // Функция экранирования кавычек и прочих ежелательных символов
        // Использовать вместе с простым simpleGet, без подготовленных запросов на переменных
        return $this->dbh->escape_string($arg);
    }


    public function simpleExec($query){
        return $this->dbh->query($query);
    }


    public function simpleGetAll($sql){
        $queryresults = $this->simpleExec($sql);
        if(!$queryresults){
            return false;
        }
        $res = [];
        while($row = $queryresults->fetch_object($this->className)) {
            $res[] = $row;
        }
        return $res;
    }


    public function simpleGetOne($sql){

        $queryresults = $this->simpleExec($sql);
        if(!$queryresults){
            // В случае неправильного запроса в этом месте вернётся false
            // В случае успешного выполнения запросов SELECT, SHOW, DESCRIBE или EXPLAIN mysqli_query()
            // вернет объект mysqli_result. Для остальных успешных запросов mysqli_query() вернет TRUE.
            return false;
        }
        return $queryresults->fetch_object($this->className);
        // Старый вариант этого метода, более ресурсоёмкий
        // return $this->queryAll($sql,$class)[0];
    }

    public function lastInsId(){
        return $this->dbh->insert_id;
    }

//*************************************************************************************************
//**************************** ПОДГОТОВЛЕННЫЕ ЗАПРОСЫ *********************************************
//*************************************************************************************************


    public function prepareGetAll($sql, $class, $paramType,  ...$args){

        $this->stmt = $this->dbh->prepare($sql);
        // Самый вынос мозга, бинд парам способен принимать массив аргументов
        // об этом ни слова в руководстве, сутки выноса мозга пока не попробовал((
        $this->stmt->bind_param($paramType,...$args);
        $this->stmt->execute();
        $queryresults = $this->stmt->get_result();

        $res = [];
        while($row = $queryresults->fetch_object($class)) {
            $res[] = $row;
        }
        return $res;
    }


    public function prepareGetOne($sql, $paramType,  ...$args){

        $this->stmt = $this->dbh->prepare($sql);
        $this->stmt->bind_param($paramType,...$args);
        $this->stmt->execute();
        $queryresults = $this->stmt->get_result();

        return $queryresults->fetch_object($this->className);
    }


    public function prepareExec($sql, $paramType,  ...$args){

        $this->stmt = $this->dbh->prepare($sql);
        $this->stmt->bind_param($paramType,...$args);
        return $this->stmt->execute();
    }






}