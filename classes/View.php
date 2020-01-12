<?php


class View
{

    protected $data = [];


    public function __set($name, $value)
    {
     $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }



    public function display($url, $items)
    {
       include __DIR__ . '/../views/' . $url;
    }


}