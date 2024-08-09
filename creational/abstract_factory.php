<?php 

interface AbstractFactory {
    public static function makeDeveloperWorker(): DeveloperWorker;
    public static function makeDesignerWorker(): DesignerWorker;

}

class OutsourceWorkerFactory implements AbstractFactory 
{
    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new OutsourceDeveloperWorker();
    }
    public static function makeDesignerWorker(): DesignerWorker
    {
        return new OutsourceDesignerWorker();
    }
}

class NativeWorkerFactory implements AbstractFactory 
{
    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new NativeDeveloperWorker();
    }
    public static function makeDesignerWorker(): DesignerWorker
    {
        return new NativeDesignerWorker();
    }
}

interface Woker {
    public function work();
}

interface DeveloperWorker extends Woker {

}
interface DesignerWorker extends Woker {
    
}

class NativeDeveloperWorker implements DeveloperWorker {
    public function work(){
        printf('I am developing as nitve');
    }
}

class OutsourceDeveloperWorker implements DeveloperWorker {
    public function work(){
        printf('I am developing as outsource');
    }
}

class NativeDesignerWorker implements DesignerWorker {
    public function work(){
        printf('I am designing as nitve');
    }
}

class OutsourceDesignerWorker implements DesignerWorker {
    public function work(){
        printf('I am designing as outsource');
    }
}


$nativeDeveloper = NativeWorkerFactory::makeDeveloperWorker();
$nativeDeveloper->work();

