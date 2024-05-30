<!DOCTYPE html>
<html>

<head>
  <title>Example</title>
</head>

<body>
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
          return "Error: Division by zero";
        }
        return $val1 / $val2;
      default:
        return "Error: Invalid operation";
    }
  }

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
    $str = strtolower($str);

    $charArray = [];

    for ($i = 0; $i < strlen($str); $i++) {
      if (in_array($str[$i], $charArray)) {
        return false;
      }
      $charArray[] = $str[$i];
    }

    return true;
  }

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

    foreach ($array as $row) {
      $minValue = min($row);
      $sum += $minValue;
    }

    return $sum;
  }

  $nestedArray = [
    [1, 2, 3, 4, 5],
    [5, 6, 7, 8, 9],
    [20, 21, 34, 56, 100]
  ];

  echo sum_of_minimums($nestedArray); // Output: 26

  ?>

</body>

</html>