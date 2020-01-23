<?php



class News
    extends AbstractModel
{
    public $id;
    public $title;
    public $text;
    public $posttime;
    public $updatetime;

    public static $table = 'posts';


    public static function getAll(){
        $query = 'SELECT * FROM '.static::$table.' ORDER BY posttime DESC';
        $db = new DBmysqli();
        return $db->simpleGetAll($query, get_called_class());
    }


    public static function getOne($id){
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id=?';
        $db = new DBmysqli();
        return $db->prepareGetOne($query, get_called_class(), 'i', $id);
    }


    public function newsAdd(){
        $query = 'INSERT INTO '.static::$table.' (title, text, posttime) VALUES (?, ?, ?)';
        $db = new DBmysqli();
        $db->prepareExec($query, 'sss', $this->title, $this->text, date('Y-m-d H-i-s', time()));
        return $db->lastInsId();
    }


    public function newsEdit(){
        $query = 'UPDATE '.static::$table.' SET title=?, text=? WHERE id=?';
        $db = new DBmysqli();
        return $db->prepareExec($query,'ssi', $this->title, $this->text, $this->id);
    }


    public static function newsDelete($id){
        $query ='DELETE FROM '.static::$table.' WHERE id=?';
        $db = new DBmysqli();
        return $db->prepareExec($query, 'i', $id);

    }

}