<?php

class WorkerPool {
    private array $freeWorkers = [];
    private array $busyWorkers = [];

    // Getter for $freeWorkers
    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    // Setter for $freeWorkers
    public function setFreeWorkers(array $workers): void
    {
        $this->freeWorkers = $workers;
    }

    // Getter for $busyWorkers
    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    // Setter for $busyWorkers
    public function setBusyWorkers(array $workers): void
    {
        $this->busyWorkers = $workers;
    }    

    public function getWorker(): Worker
    {
        
        if(count($this->freeWorkers) === 0){
            $worker = new Worker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }

        $this->busyWorkers[spl_object_hash($worker)] = $worker;
        return $worker;
    
    }
    public function release(Worker $worker){
        $key = spl_object_hash($worker);
        if(isset($key)){
            unset($this->busyWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }
}

class Worker {
    public function work(){
        printf('I am working');
    }
}

$pool = new WorkerPool();

$worker = $pool->getWorker();
$pool->getWorker();
$pool->getWorker();
$pool->getWorker();

var_dump($pool->getBusyWorkers());