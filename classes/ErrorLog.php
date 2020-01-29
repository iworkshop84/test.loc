<?php


class ErrorLog
{

    public $code;
    public $message;
    public $previous;
    public $trace;


    private function error() :string
    {
        $logStr = '';
        $logStr .= 'Date: ' . date('H:m:s m.d.Y', time());
        $logStr .= ' |MyCode:| '. $this->code. ' |MyMsg:| ' . $this->message;
        $logStr .= ' |File:| '. $this->trace[0]['file'] . ' |Line:| ' . $this->trace[0]['line'];
        $logStr .= ' |Class:| '. $this->trace[0]['class'];

        return $logStr;
    }

    public function log(){
            file_put_contents(__DIR__ . '/../log.txt', $this->error() .
                PHP_EOL, FILE_APPEND);

    }
}

/*
 * 'Date: ' .
                date('H:m:s m.d.Y', time()) .' | '. $this->code. ' | ' . $this->message . ' | ' .
                $this->previous->getMessage().
 */