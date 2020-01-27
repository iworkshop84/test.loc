<?php


/**
 * Class News
 * @author iworkshop84
 *
 * @property integer $id;
 * @property string $title;
 * @property string $text;
 * @property string posttime;
 * @property string updatetime;
 *
 */
class News
    extends AbstractModel
{
    protected static $allowedColls = ['id','title','text','posttime','updatetime'];
    protected static $table = 'posts';


    /**  Старый вариант
        public static function getAll() : array
        {
            $db = new DBpdo();
            $db->setClassName(get_called_class());
            return $db->query('SELECT * FROM '.static::$table.' ORDER BY posttime DESC');
        }

        public function newsAdd()
        {
            $query = 'INSERT INTO '.static::$table.' (title, text, posttime) VALUES (?, ?, ?)';

            $db = new DBmysqli();
            $db->prepareExec($query, 'sss', $this->title, $this->text, date('Y-m-d H-i-s', time()));
            return $db->lastInsId();
        }

        public function newsEdit()
        {
            $query = 'UPDATE '.static::$table.' SET title=?, text=? WHERE id=?';
            $db = new DBmysqli();
            return $db->prepareExec($query,'ssi', $this->title, $this->text, $this->id);
        }


    public static function newsDelete($id)
        {
        $query ='DELETE FROM '.static::$table.' WHERE id=?';
        $db = new DBmysqli();
        return $db->prepareExec($query, 'i', $id);
        }
        */

}