<?php


class TestStend
{

    public $startTime = null;
    public $endTime = null;

    public function __construct()
    {
        list($usec, $sec) = explode(" ", microtime());
        $this->startTime = ((float)$usec + (float)$sec);
    }

    public function end(){
        list($usec, $sec) = explode(" ", microtime());
        $time = ((float)$usec + (float)$sec);
        return $this->endTime = $time - $this->startTime;
    }



}