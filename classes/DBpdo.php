<?php
include_once __DIR__ . '/../core/dbconfig.php';

class DBpdo
{
    private $dbh;
    private $className = 'stdClass';


    public function __construct()
    {
        $this->dbh = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME,
                                        DB_USER, DB_PASSWORD);
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function exec($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
        //return $sth->rowCount();
    }

    public function rowCount()
    {

    }


    public function lastInsId()
    {
        return $this->dbh->lastInsertId();
    }






}

