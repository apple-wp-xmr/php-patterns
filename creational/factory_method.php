<?php

interface Worker 
{
    public function work();
}

class Developer implements Worker {
    public function work(){
        printf('I am developer at work');
        echo '<br>';
    }
}
class Designer implements Worker {
    public function work(){
        printf('I am designer at work');
    }
}

interface WorkerFactory {
    public static function make();
}

class DeveloperFactory implements WorkerFactory 
{
    public static function make(): Worker
    {
        return new Developer();
    }
}
class DesignerFactory implements WorkerFactory 
{
    public static function make(): Worker
    {
        return new Designer();
    }
}

$developer = DeveloperFactory::make();
$developer->work();
$designer = DesignerFactory::make();
$designer->work();