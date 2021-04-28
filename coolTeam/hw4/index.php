<?php
require_once 'vendor/autoload.php';

use coolTeam\hw4\controllers\Controller as Controller;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$controller = new Controller();
$controller->tileMakerController();
