<?php
include_once __DIR__ . '/../core/dbconfig.php';

class DBmysqli
{
    private $dbh = null;
    private $stmt = null;
    private $stmtResult = null;

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


    public function simpleExec($query){
        return $this->dbh->query($query);
    }


    public function simpleGetAll($sql, $class = 'stdClass'){
        $queryresults = $this->simpleExec($sql);
        if(!$queryresults){
            return false;
        }
        $res = [];
        while($row = $queryresults->fetch_object($class)) {
            $res[] = $row;
        }
        return $res;
    }


    public function simpleGetOne($sql, $class = 'stdClass'){

        $queryresults = $this->simpleExec($sql);
        if(!$queryresults){
            // В случае неправильного запроса в этом месте вернётся false
            // В случае успешного выполнения запросов SELECT, SHOW, DESCRIBE или EXPLAIN mysqli_query()
            // вернет объект mysqli_result. Для остальных успешных запросов mysqli_query() вернет TRUE.
            return false;
        }
        return $queryresults->fetch_object($class);
        // Старый вариант этого метода, более ресурсоёмкий
        // return $this->queryAll($sql,$class)[0];
    }


    public function escapeStrForSimple($arg){
        // Функция экранирования кавычек и прочих ежелательных символов
        // Использовать вместе с простым simpleGet, без подготовленных запросов на переменных
        return $this->dbh->escape_string($arg);
    }








    public function prepQuery(...$args){
            $sql = array_shift($args);

            //$this->stmt = $this->dbh->prepare("SELECT * FROM posts WHERE id=?");
            $this->stmt = $this->dbh->prepare("INSERT INTO posts (title,text) VALUES (?, ?)");

            $title = '13';
            $text = '12';
            $id = 1;
            $this->stmt->bind_param('ss',$title,$text);

            $this->stmt->execute();
            var_dump($this->stmt);
            $queryresults = $this->stmt->get_result();


        $res = [];
        while($row = $queryresults->fetch_object()) {
            $res[] = $row;
        }
        var_dump( $res);

    }

}