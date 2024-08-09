<?php

abstract class WorkerPrototype {
    protected string $name;
    protected string $position;

    // Getter for $name
    public function getName(): string {
        return $this->name;
    }

    // Setter for $name
    public function setName(string $name): void {
        $this->name = $name;
    }

    // Getter for $position
    public function getPosition(): string {
        return $this->position;
    }

    // Setter for $position
    public function setPosition(string $position): void {
        $this->position = $position;
    }
}

class Developer extends WorkerPrototype 
{
    protected string $position = 'developer';
}

$developer = new Developer();
$developer2 = clone $developer;

$developer2->setName('Bob');
var_dump($developer2->getName());