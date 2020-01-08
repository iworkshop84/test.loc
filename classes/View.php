<?php


class View
{

    public function display($url, $items)
    {
       include __DIR__ . '/../views/' . $url;
    }






}