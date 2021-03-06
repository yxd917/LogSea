<?php
namespace LogSea;


use LogSea\config\OptionPaddle;

class Client
{
    protected  $server;
    public function __construct()
    {
        $server = new \Swoole\Server(OptionPaddle::$host, OptionPaddle::$port);
        $server->set(OptionPaddle::$option);
        foreach (OptionPaddle::$events as $k=>$v){
            $server->on($k,[$v,"listen"]);
        }
        $this->server = $server;
        $server->start();
    }
}