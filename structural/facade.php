<?php

class WorkerFacade {
    private Developer $developer;
    private Designer $designer;

    public function __construct(Developer $developer, Designer $designer)
    {
        $this->developer = $developer;
        $this->designer = $designer;
    }

    public function startWork(){
        $this->designer->startDesign();
        $this->developer->startDevelop();
    }

}

class Developer {
    public function startDevelop(){
        print_r('I am developing' . PHP_EOL);
 
    }

}

class Designer {
    public function startDesign(){
        print_r('I am developing');
    }

}

$developer = new Developer();
$designer = new Designer();

$workerFacade = new WorkerFacade($developer, $designer);
$workerFacade->startWork(); 
