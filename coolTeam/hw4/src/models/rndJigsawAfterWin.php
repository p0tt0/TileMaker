<?php

function settileMakerInd(){
  $indArray = [0, 1, 2, 3, 4, 5, 6, 7, 8];
  for($i = 0; $i < 9; $i++) {
    $indRnd = rand(0, 8);
    $tmp = $indArray[$indRnd];
    $indArray[$indRnd] = $indArray[$i];
    $indArray[$i] = $tmp;
  }
  // write to src/resources/active_image.txt;
  file_put_contents("../../src/resources/test.txt", serialize($indArray));
}

settileMakerInd();
?>
