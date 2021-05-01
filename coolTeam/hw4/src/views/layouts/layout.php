<?php
namespace coolTeam\hw4\views\layouts;

use coolTeam\hw4\views\View as View;

class Layout {
  function tileMakerLayout($view, $index, $strUploadText) {
    $jigsawView = new View();
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Tile Maker</title>
    </head>
    <body>
      <h1>Tile</h1>
    <?php
    $jigsawView->$view($index, $strUploadText);
    ?>
    </body>
    </html><?php
  }
}
