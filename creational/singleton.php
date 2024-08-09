<?php

final class Connection {
    private static ?self $instance  = null;
    private static string $name;

    public static function setName($name){
        self::$name = $name;
    }

    public static function getName(){
        return self::$name;
    }


    public static function getInstance(): self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
        
    }

    protected function __construct(){}
    public function __clone() {}
    public function __wakeup() {}


}

$connection = Connection::getInstance();
$connection::setName('Laravel');

$connection2 = Connection::getInstance();

var_dump($connection2::getName());