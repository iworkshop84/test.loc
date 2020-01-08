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
        $db = new DB();
        return $db->queryAll('SELECT * FROM ' . static::$table . ' ORDER BY posttime DESC',  get_called_class());
    }

    /*
    public static function getOne($id){
        $db = new DB();
        return $db->queryOne('SELECT * FROM ' . static::$table . ' WHERE id='.$id, 'News');
    }
    */
    public function newsAdd(){
        $query ="INSERT INTO posts (title, text, posttime) 
        VALUES ('". $this->title ."', '". $this->text. "', '". date('Y-m-d H-i-s', time()) . "')";
        $db = new DB();
        $db->exec($query);
        return $db->lastInsId();
    }

    public function newsEdit(){
        $query ="UPDATE posts SET title ='". $this->title ."', text ='". $this->text. "'
        WHERE id ='". $this->id ."'";
        $db = new DB();
        $db->exec($query);
        return $db->lastInsId();
    }

    public static function newsDelete($id){
        $query ="DELETE FROM posts WHERE id='". $id ."'";
        $db = new DB();
        return $db->exec($query);
    }

}