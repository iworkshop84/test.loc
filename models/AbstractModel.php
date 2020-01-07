<?php


class AbstractModel
{
    public static $table;

    public static function getAll(){
        $db = new DB();
        return $db->queryAll('SELECT * FROM ' . static::$table, get_called_class());
    }

    public static function getOne($id){
        $db = new DB();
        return $db->queryOne('SELECT * FROM ' . static::$table . ' WHERE id='.$id, get_called_class());
    }

}