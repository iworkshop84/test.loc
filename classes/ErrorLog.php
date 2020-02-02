<?php
namespace App\Classes;

class ErrorLog
{

    public $code;
    public $message;
    public $trace;


    private function error() :string
    {
        $logStr = '';
        $logStr .= '|Date:| ' . date('H:m:s m.d.Y', time());
        $logStr .= ' |MyCode:| '. $this->code. ' |MyMsg:| ' . $this->message;
        $logStr .= ' |File:| '. $this->trace[0]['file'] . ' |Line:| ' . $this->trace[0]['line'];
        $logStr .= ' |Class:| '. $this->trace[0]['class'];

        return $logStr;
    }

    public function writeLog()
    {
            file_put_contents(__DIR__ . '/../log.txt', $this->error() .
                PHP_EOL, FILE_APPEND);

    }

    public static function readLog()
    {
        $exist = file_exists(__DIR__ . '/../log.txt');
        if($exist){
            $data = file_get_contents(__DIR__ . '/../log.txt');
            $res = preg_split('/\\r\\n/', $data, null,PREG_SPLIT_NO_EMPTY);
            $ret = [];
            foreach ($res as $val){
                $ret[] = preg_split('/\s?[|a-zA-Z|:]+\s/', $val, 0,PREG_SPLIT_NO_EMPTY);
            }
            return $ret;
        }
        return [];
    }
}
