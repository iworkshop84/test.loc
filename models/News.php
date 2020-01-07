<?php



class News
{
    public $id;
    public $title;
    public $text;
    public $posttime;
    public $updatetime;

    public static $table = 'posts';

    public static function getAll(){
        $db = new DB();
        return $db->queryAll('SELECT * FROM ' . static::$table, 'News');
    }

    public static function getOne($id){
        $db = new DB();
        return $db->queryOne('SELECT * FROM ' . static::$table . ' WHERE id='.$id, 'News');
    }

}