<?php


abstract class AbstractModel
{
    protected static $table;

    protected static $allowedColls;
    protected static $allowedSort = ['ASC','DESC'];

    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    protected static function checkAllowed($data, $allowedArr)
    {
        if(in_array($data, $allowedArr))
        {
            return $data;
        }
        return false;
    }



    public static function simpleGetAll()
    {
        $db = new DBpdo();
        $db->setClassName(get_called_class());
        return $db->query('SELECT * FROM '.static::$table);
    }


    public static function orderGetAll($column='id', $order='ASC')
    {
        $db = new DBpdo();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM '. static::$table .' ORDER BY '.
            static::checkAllowed($column, static::$allowedColls) .' '.
            static::checkAllowed($order, static::$allowedSort);
        $res = $db->query($sql);
        return $res;
    }


    public static function getOneByColumn($column, $value)
    {
        $db = new DBpdo();
        $db->setClassName(get_called_class());
        $query = 'SELECT * FROM ' . static::$table . ' WHERE '.
            static::checkAllowed($column,  static::$allowedColls).'=:'.$column;
        $res = $db->query($query, [':'.$column=>$value]);
        if(empty($res)){
           return null;
        }
        return $res[0];
    }


     public static function getOneById($id)
    {
        $db = new DBpdo();
        $db->setClassName(get_called_class());
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($query, [':id'=>$id])[0];
        if(empty($res)){
            return null;
        }
        return $res[0];
    }


    private function insert()
    {
        $cols = array_keys($this->data);
        //$vals = [];
        $dataIns = [];
        foreach ($cols as $val){
            // убрал массив для подстановок в VALUES, заменил на ключи из массива с значениями
            //$vals[] = ':'. $val;
            $dataIns[':'. $val] = $this->data[$val];
        }

        $sql = 'INSERT INTO '.static::$table.' ('.
            implode(', ', $cols) .') VALUES ('. implode(', ', array_keys($dataIns))  .')';

        $db = new DBpdo();
        $db->exec($sql, $dataIns);
        return $db->lastInsId();
        }


        private function update()
        {
            $arr = $this->data;
            $dataIns =[];
            $rools =[];
            foreach ($arr as $key=>$val){
                $dataIns[':' . $key] = $val;
                $rools[$key] = $key .' = :' . $key;
            }
            $where = array_shift($rools);
            $sql = 'UPDATE '.static::$table. ' SET '. implode(', ', ($rools)) .'
            WHERE ('. $where .')';
            $db = new DBpdo();
            $db->exec($sql, $dataIns);
            return $db->lastInsId();
        }


        public function delete($column, $value)
        {
            $sql ='DELETE FROM '.static::$table.' WHERE '.
                static::checkAllowed($column,  static::$allowedColls).'=:'.$column;
            $db = new DBpdo();
            return $db->exec($sql, [':'.$column=>$value]);
        }


        public function save()
        {
            if(isset($this->id)){
                return $this->update();
            }else{
                return $this->insert();
            }
        }

}