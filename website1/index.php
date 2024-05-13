<!DOCTYPE html>
<html>

<head>
  <title>Example</title>
</head>

<body>
  <form action="action.php" method="post">
    <label for="name">Your name:</label>
    <input name="name" id="name" type="text">

    <label for="age">Your age:</label>
    <input name="age" id="age" type="number">

    <button type="submit">Submit</button>
  </form>

  <?= "<h2>Hello there</h2>" ?>

  <?php
  $expression = true;
  ?>

  <?php if ($expression == true) : ?>
    This will show if the expression is true.
  <?php else : ?>
    Otherwise this will show.
  <?php endif; ?>

</body>

</html>