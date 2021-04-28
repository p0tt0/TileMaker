<?php
if(isset($_POST["data"]))
{
  $str = $_POST["data"];
  //print_r (explode(",",$str));
  $indStr = explode(",",$str);
  //print_r ($indStr);
  $index =[9];
  $index[0] = (int)($indStr[0]);
  $index[1] = (int)($indStr[1]);
  $index[2] = (int)($indStr[2]);
  $index[3] = (int)($indStr[3]);
  $index[4] = (int)($indStr[4]);
  $index[5] = (int)($indStr[5]);
  $index[6] = (int)($indStr[6]);
  $index[7] = (int)($indStr[7]);
  $index[8] = (int)($indStr[8]);
  updateIndArray($index);
}

// update jigsaw index after user swap jigsaw and user still does not win
function updateIndArray($array) {
  file_put_contents("../../src/resources/test.txt", serialize($array));
}
