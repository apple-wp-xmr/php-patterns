<?php

namespace Core;

class Container
{
    protected array $bindings = [];

    public function bind($key, $resolver){
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key){
        
        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception($key . ' Doesn\'t exists');
        };

        if(array_key_exists($key, $this->bindings)){
            $resolver = $this->bindings[$key];

            return $resolver();
        }
    }
}