<?php


class View

{

    public $data = [];


    public function __set($name, $value)
    {
     $this->data[$name] = $value;
    }


    public function __get($name)
    {
        return $this->data[$name];
    }


    public function render($url)
    {
        foreach ($this->data as $key=>$value){
            $$key = $value;
        }

       ob_start();
       include __DIR__ . '/../views/' . $url;
       $contentStream = ob_get_contents();
       ob_end_clean();
       return $contentStream;
    }


    public function display($tpl){
        echo $this->render($tpl);
    }


    public function count(){
            return count($this->data);
    }


    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}