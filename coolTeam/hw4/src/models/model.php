<?php
namespace coolTeam\hw4\models;

define("RANDOMIND", "src/resources/test.txt");
class Model {

  //save selected image to active_image.jpg
  function uploadImgToServer() {
    // location to store file
    $targetDir = "src/resources/";
    $targetName = "test.jpg";
    // tore at src/resource/active_image.jpg
    $targetFile = $targetDir .$targetName;
    // status of selected file
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    $img;

    //Check if file is in .jpg .png .gif
    // gif = 1, jpg = 2, png = 3
    $typeOfFile = exif_imagetype($_FILES["img"]["tmp_name"]);
    if(!(($typeOfFile == "1"))){
      $uploadOk = 0;
      return "Unsuccessful upload wrong file type";
    }
    else {
      if ($typeOfFile == "1") {
        $img = imagecreatefromjpeg($_FILES["img"]["tmp_name"]);
      }
      
      // resize image
      $img = imagescale($img, 200, 200);
    }

    //Check file size to less than 2MB
    if($_FILES["img"]["size"] > 2000000) {
      return "Sorry, your file is too large; Max size is 2 MB.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      return "Sorry, your file cannot be uploaded.";
      // if everything is ok, try to upload file
    } else {
      // create jpg file
      if(imagejpeg($img, $_FILES["img"]["tmp_name"])) {
        imagedestroy($img);
        // check move file
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
          $this->settileMakerInd();
          return "Successful file Upload";
        } else {
          return "Sorry, there was an error uploading your file.";
        }
      }
    }
  }

  //set random jigsaw index after use select new image or user wins
  function settileMakerInd(){
    $indArray = [0, 1, 2, 3, 4, 5, 6, 7, 8];
    for($i = 0; $i < 9; $i++) {
      $indRnd = rand(0, 8);
      $tmp = $indArray[$indRnd];
      $indArray[$indRnd] = $indArray[$i];
      $indArray[$i] = $tmp;
    }
    // write to src/resources/active_image.txt;
    file_put_contents("src/resources/active_image.txt", serialize($indArray));
  }

  //get jigsaw index from active_image.txt
  function gettileMakerInd() {
    if(file_exists(RANDOMIND)) {
      $ind = unserialize(file_get_contents(RANDOMIND));
      if($ind) {
        return $ind;
      }
    }
    return [];
  }
}
