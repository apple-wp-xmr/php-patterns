<?php 

class Worker {
    private string $name;

    public function __construct($name){
        $this->name = $name;
    }

    public static function make($args): Worker
    {
        return new self($args['name']);
    }

    public function getName(){
        return $this->name;
    }
}


class WorkerMapper {
    private WorkerStorageAdapter $workerStorageAdapter;

    public function __construct(WorkerStorageAdapter $workerStorageAdapter){
        $this->workerStorageAdapter = $workerStorageAdapter;
    }

    public function findById($id): string|Worker
    {
        $res = $this->workerStorageAdapter->find($id);
        if($res === null){
            return 'no such worker';
        }
       return $this->make($res);
    }

    private function make($args): Worker
    {
        return Worker::make($args);
    }
}

class WorkerStorageAdapter {
    private array $data = [];

    public function __construct($data){
        $this->data = $data;
    }

    public function find($id){
        if(isset($this->data[$id])){
            return $this->data[$id];
        }else{
            return null;
        }
    }
}

$data = [
    1 => [
        'name' => 'bob'
    ]

];

$workerStorageAdapter = new WorkerStorageAdapter($data);
$workerMapper = new WorkerMapper($workerStorageAdapter);

$worker = $workerMapper->findById(1);

print_r($worker->getName());