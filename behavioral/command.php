<?php

interface Command {
    public function execute();
}

interface UndoableCommand extends Command {
    public function undo();
}

class OutputReciver
{
    private bool $isEnable = true;
    public function enable(){
        $this->isEnable = true;
    }
    public function disable(){
        $this->isEnable = false;
    }

    private string $body = '';

    public function getBody(){
        return $this->body;
    }

    public function write($str){
        if($this->isEnable){
            $this->body = $str;
        }
    }
}

// class Invoker {
//     private Command $command;

//     public function setCommand (Command $command)
//     {
//         $this->command = $command;
//     }

//     public function run(){
//         $this->command->execute();
//     }
// }

class MessageCommand implements Command
{
    private OutputReciver $output;

    public function __construct(OutputReciver $output)
    {
        $this->output = $output;
    }

    public function execute(){
        $this->output->write('some string from execute');
    }
}

class ChangerStatusCommand implements UndoableCommand {
    private OutputReciver $output;

    public function __construct(OutputReciver $output)
    {
        $this->output = $output;
    }


    public function execute()
    {
        $this->output->enable();
    }
    public function undo()
    {
        $this->output->disable();
    }
}

$output = new OutputReciver();
// $invoker = new Invoker();
$message = new MessageCommand($output);

$changeStatus = new ChangerStatusCommand($output);
$changeStatus->undo();
// $changeStatus->execute();
$message->execute();


var_dump($output->getBody());