<?php

interface NativeWorker {
    public function countSalary();
}

interface OutsorceWorker{
    public function countSalaryByHour($hour);
}

class NativeDeveloper implements NativeWorker
{
    public function countSalary(): int
    {
        return 3000 * 20;
    }
}

class OutsorceDeveloper implements OutsorceWorker
{
    public function countSalaryByHour($hours): int
    {
        return $hours * 500;
    }
}

class OutsourceWorkerAdapter implements NativeWorker {
    private OutsorceWorker $outsorceWorker;

    public function __construct(OutsorceWorker $outsorceworker)
    {
        $this->outsorceWorker = $outsorceworker;
    }

    public function countSalary()
    {
        return $this->outsorceWorker->countSalaryByHour(80);
    }
}


$nativeDeveloper = new NativeDeveloper();
$outsorceDeveloper = new OutsorceDeveloper();

$outsorceWorkerAdapter = new OutsourceWorkerAdapter($outsorceDeveloper);

var_dump($nativeDeveloper->countSalary());
var_dump($outsorceWorkerAdapter->countSalary());