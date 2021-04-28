<?php
namespace coolTeam\hw4\controllers;
define("RANDOMIND", "src/resources/test.txt");

use coolTeam\hw4\models\Model as model;
use coolTeam\hw4\views\layouts\Layout as Layout;
use coolTeam\hw4\models\monolog\Monolog as Monolog;

class Controller {
  function tileMakerController() {
    if(isset($_POST["upload"])) {
      $layout = new Layout();
      $model = new Model();
      $strUploadText = $model->uploadImgToServer();
      $index = $model->gettileMakerInd();
      $layout->tileMakerLayout("jigsawView", $index, $strUploadText);
      $monolog = new Monolog();
      $monolog->updatetileMakerLog();
    } else {
      $layout = new Layout();
      $model = new Model();
      $index = $model->gettileMakerInd();
      $strUploadText = "Click to select new Image";
      $layout->tileMakerLayout("jigsawView", $index, $strUploadText);
    }
  }
}
