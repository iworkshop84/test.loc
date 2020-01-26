<?php


abstract class AbstractModel
{
    public static $table;

    public static function simpleGetAll(){

        $db = new DBpdo();
        $db->setClassName(get_called_class());
        return $db->query('SELECT * FROM '.static::$table);
    }

}