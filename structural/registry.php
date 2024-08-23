<?php
abstract class Regestry {
    private static array $services = [];

    final public static function setService($key, Service $service){
        self::$services[$key] = $service;
    }

    final public static function getService($key): string|Service
    {
        if(isset(self::$services[$key])){
            return self::$services[$key];
        }else{
            return 'this service doesn\'t exists';
        }
    }
}

class Service {

}

$ser = new Service();
Regestry::setService(1, $ser);

print_r(Regestry::getService(1));