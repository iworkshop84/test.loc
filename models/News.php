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

        $db = new DBpdo();
        $db->setClassName(get_called_class());
        $sql =  'INSERT INTO '.static::$table.' (title, text) VALUES (:title, :text)';
        $db->exec( $sql, [':title'=>10, ':text'=>20]);
        $db->exec( $sql, [':title'=>50, ':text'=>70]);
        $res = $db->lastInsId();
        var_dump($res);

        die;
        return $db->query('SELECT * FROM '.static::$table.' ORDER BY posttime DESC');
    }

    public static function getOneById($id){

        $db = new DBpdo();
        $db->setClassName(get_called_class());
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        return $db->query($query, [':id'=>$id])[0];

    }



    public static function getOne($id){
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id=?';
        $db = new DBmysqli();
        $db->setClassName(get_called_class());
        return $db->prepareGetOne($query, 'i', $id);
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