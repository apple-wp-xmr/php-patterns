<?php

include 'Container.php';
include 'Database.php';
include 'App.php';

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

App::setContainer($container);
App::bind('Core\Database', function(){
    new Database;
});