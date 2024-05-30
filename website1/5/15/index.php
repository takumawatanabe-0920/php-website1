<!DOCTYPE html>
<html>

<head>
  <title>Example</title>
</head>

<body>
  <h1>Test1</h1>

  <?php
  // class MenuItem
  // {
  //   private int $cost;
  //   private string $name;

  //   public function setCost(string $cost): void
  //   {
  //     $this->cost = $cost;
  //   }

  //   public function getCost(): string
  //   {
  //     return $this->cost;
  //   }

  //   public function setName(string $name): void
  //   {
  //     $this->name = $name;
  //   }

  //   public function getName(): string
  //   {
  //     return $this->name;
  //   }

  //   public function print(): void
  //   {
  //     $name = $this->getName();
  //     $cost = $this->getCost();

  //     echo "I bought $name for $cost" . "<br>";
  //   }
  // }

  // $roastedChicken = new MenuItem();
  // $roastedChicken->setName('Roasted Chicken');
  // $roastedChicken->setCost(10);
  // var_dump($roastedChicken->getName());
  // var_dump($roastedChicken->getCost());

  // $breadedChicken = new MenuItem();
  // $breadedChicken->setName('Breaded Chicken');
  // $breadedChicken->setCost(11);

  // $breadedChicken->print();

  // $breadedChicken->setName('Super Breaded Chicken');
  // $breadedChicken->setCost(20);

  // $breadedChicken->print();

  class Dice
  {

    public function rollDice(): int
    {
      return rand();
    }
  }

  $dice = new Dice();
  echo $dice->rollDice();
  echo "<br>";
  echo $dice->rollDice();

  ?>
</body>

</html>