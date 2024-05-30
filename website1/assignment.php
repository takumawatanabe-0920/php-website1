<!DOCTYPE html>
<html>

<head>
  <title>Example</title>
</head>

<body>
  <style>
    .red {
      background-color: red;
    }

    .blue {
      background-color: blue;
    }
  </style>

  <?php
  $v1 = 'test';
  $v2 = 1;
  ?>

  <?php
  // アルファベットの最初の5文字を配列として作成
  $alphabet = ['A', 'B', 'C', 'D', 'E'];

  // 配列の3番目の文字を出力（0から始まるインデックスのため、インデックスは2）
  echo $alphabet[2];
  ?>


</body>


</html>