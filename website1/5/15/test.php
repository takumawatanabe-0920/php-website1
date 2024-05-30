<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php

  // echo "A $color $fruit"; // A

  // include 'vars.php';

  // echo "A $color $fruit"; // A green apple
  include 'colors.php';

  ?>

  <div style="
      width: 100px;
      height: 100px;
      background-color: <?= $red ?>;
    " />

  <div style="
      width: 100px;
      height: 100px;
      background-color: <?= $blue ?>;
    " />
</body>

</html>