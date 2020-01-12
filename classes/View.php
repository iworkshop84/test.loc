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

    public function display($url)
    {
        foreach ($this->data as $key=>$value){
            $$key = $value;
        }
       include __DIR__ . '/../views/' . $url;
    }


}