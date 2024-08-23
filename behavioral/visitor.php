<?php

interface WorkerVisitor {
    public function visitDeveloper(Worker $worker);
    public function visitDesigner(Worker $worker);
}

class RecorderVisitor implements WorkerVisitor
{
    private array $visited = [];

    public function getVisited(){
        return $this->visited;
    }

    public function visitDeveloper(Worker $developer)
    {
        $this->visited[] = $developer;
    }
    public function visitDesigner(Worker $designer)
    {
        $this->visited[] = $designer;
    }
}

interface Worker {
    public function work();
    public function accept(WorkerVisitor $vistor);
}

class Developer implements Worker {
    public function work()
    {
        printf('Developer is working');
    }
    public function accept(WorkerVisitor $vistor)
    {
        $vistor->visitDeveloper($this);
    }
}

class Designer implements Worker {
    public function work()
    {
        printf('Designer is working');
    }
    public function accept(WorkerVisitor $vistor)
    {
        $vistor->visitDesigner($this);
    }
}

$visitor = new RecorderVisitor();

$developer = new Developer();
$designer = new Designer();

$developer->accept($visitor);
$designer->accept($visitor);

var_dump($visitor->getVisited());