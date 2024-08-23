<?php 

class ControllerConfiguration {
    private string $name;
    private string $action;

    public function __construct(string $name, string $action)
    {
        $this->name = $name;
        $this->action = $action;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}

class Controller {
    private ControllerConfiguration $controllerConfiguration;

    public function __construct(ControllerConfiguration $controllerConfiguration)
    {
        $this->controllerConfiguration = $controllerConfiguration;
    }

    public function getConfiguration(): string
    {
        return $this->controllerConfiguration->getName() . '@' . $this->controllerConfiguration->getAction();
    }
}

$configuration = new ControllerConfiguration('supper', 'text');
$controller1 = new Controller($configuration);

print_r($controller1->getConfiguration());