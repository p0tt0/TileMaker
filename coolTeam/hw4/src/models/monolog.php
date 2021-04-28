<?php
namespace coolTeam\hw4\models\monolog;

require_once 'vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
class Monolog {
  //create jigsaw.log to record the attemping of upload files
  function updatetileMakerLog(){
    // Create the logger
    $logger = new Logger('my_logger');
    // Now add some handlers
    $logger->pushHandler(new StreamHandler('src/resources/tileMaker.log', Logger::DEBUG));
    $logger->pushHandler(new FirePHPHandler());
    // You can now use your logger
    $logger->info('Attempt to upload file');
  }
}
 ?>
