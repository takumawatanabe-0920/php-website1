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

  <?= "<h2>Hello there</h2>" ?>

  <?php
  $expression = true;
  $my_class = true;
  ?>

  <?php if ($expression == true) : ?>
    This will show if the expression is true.
  <?php else : ?>
    Otherwise this will show.e89e04a8f5a9
  <?php endif; ?>

  <?php
  if ($expression == true) {
    $my_class = "red";
  } else {
    $my_class = "blue";
  }
  ?>

  <div class="<?= $my_class ?>">
    My square
  </div>


  <?php
  // アルファベットの最初の5文字を配列として作成
  $alphabet = ['A', 'B', 'C', 'D', 'E'];

  // 配列の3番目の文字を出力（0から始まるインデックスのため、インデックスは2）
  echo $alphabet[2];
  ?>

  <?php

  class Speaker
  {
    public function sayGoodbye()
    {
      echo "Goodbye\n";
    }
  }

  $speaker1 = new Speaker();
  $speaker2 = new Speaker();
  $speaker3 = new Speaker();

  $speaker1->sayGoodbye();
  $speaker2->sayGoodbye();
  $speaker3->sayGoodbye();

  ?>

  <?php

  function basicOp($op, $val1, $val2)
  {
    switch ($op) {
      case '+':
        return $val1 + $val2;
      case '-':
        return $val1 - $val2;
      case '*':
        return $val1 * $val2;
      case '/':
        if ($val2 == 0) {
          return "Error: Division by zero"; // Zero division check
        }
        return $val1 / $val2;
      default:
        return "Error: Invalid operation"; // Invalid operation check
    }
  }

  // Examples of usage:
  echo basicOp('+', 4, 7) . "\n"; // Output: 11
  echo basicOp('-', 15, 18) . "\n"; // Output: -3
  echo basicOp('*', 5, 5) . "\n"; // Output: 25
  echo basicOp('/', 49, 7) . "\n"; // Output: 7
  echo basicOp('/', 49, 0) . "\n"; // Output: Error: Division by zero
  echo basicOp('%', 49, 7) . "\n"; // Output: Error: Invalid operation
  ?>

  <?php

  function isIsogram($str)
  {
    // Convert the string to lowercase
    $str = strtolower($str);

    // Initialize an empty array to track characters
    $charArray = [];

    // Loop through each character in the string
    for ($i = 0; $i < strlen($str); $i++) {
      // If the character is already in the array, return false
      if (in_array($str[$i], $charArray)) {
        return false;
      }
      // Add the character to the array
      $charArray[] = $str[$i];
    }

    // If no duplicates were found, return true
    return true;
  }

  // Examples of usage:
  echo isIsogram("Dermatoglyphics") ? 'true' : 'false'; // Output: true
  echo "\n";
  echo isIsogram("aba") ? 'true' : 'false'; // Output: false
  echo "\n";
  echo isIsogram("moOse") ? 'true' : 'false'; // Output: false
  echo "\n";
  echo isIsogram("") ? 'true' : 'false'; // Output: true
  echo "\n";

  ?>

  <?php

  function sum_of_minimums($array)
  {
    $sum = 0;

    // Loop through each row in the 2D array
    foreach ($array as $row) {
      // Find the minimum value in the current row
      $minValue = min($row);
      // Add the minimum value to the sum
      $sum += $minValue;
    }

    return $sum;
  }

  // Example usage:
  $nestedArray = [
    [1, 2, 3, 4, 5],
    [5, 6, 7, 8, 9],
    [20, 21, 34, 56, 100]
  ];

  echo sum_of_minimums($nestedArray); // Output: 26

  ?>


</body>

</html>