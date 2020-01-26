<?php


abstract class AbstractModel
{
    public static $table;

    protected static $allowedColls;
    protected static $allowedSort = ['ASC','DESC'];


    public static function simpleGetAll() : array
    {
        $db = new DBpdo();
        $db->setClassName(get_called_class());
        return $db->query('SELECT * FROM '.static::$table);
    }

    protected static function checkSort($data, $allowed)
    {
        if(in_array($data, $allowed))
        {
            return $data;
        }
        return false;
    }

    public static function orderGetAll($column='id', $order='ASC') : array
    {
        $db = new DBpdo();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM '. static::$table .' ORDER BY '.
            static::checkSort($column, static::$allowedColls) .' '. static::checkSort($order, static::$allowedSort);
        return $db->query($sql);
    }


    public static function getOneByColumn($column, $value) : object
    {
        $db = new DBpdo();
        $db->setClassName(get_called_class());
        $query = 'SELECT * FROM ' . static::$table . ' WHERE '.
            static::checkSort($column,  static::$allowedColls).'=:'.$column;

        return $db->query($query, [':'.$column=>$value])[0];
    }


     public static function getOneById($id) : object
    {
        $db = new DBpdo();
        $db->setClassName(get_called_class());
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        return $db->query($query, [':id'=>$id])[0];
    }


}