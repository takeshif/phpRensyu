<?php

class Entree {
  public $name;
  public $ingredients = array();

  public function __construct($name,$ingredients) {
    if (! is_array($ingredients)) {
      throw new Exception('$ingredinets must be an array');
    }
    $this->name = $name;
    $this->ingredients = $ingredients;
  }

  public function hasIngredient($ingredient) {
    return in_array($ingredient, $this->ingredients);
  }

  public static function getSize() {
    return array('small','medium','large');
  }
}

$soup = new Entree('Chicken Soup', array('chicken','water'));

$sandwich = new Entree('Chiken Sandwitch',array('chicken','bread'));

foreach (['chicke','lemon','bread','water'] as $ing) {
  if ($soup->hasIngredient($ing)) {
    print "Soup contains $ing.\n";
  }
  if ($sandwich->hasIngredient($ing)) {
    print "Sandwich contains $ing.\n";
  }
}

$size = Entree::getSize();

try {
  $drink = new Entree('Grass of Milk', 'milk');
  if ($dring->hasIngredient('milk')) {
    print "Yummy!";
  }
} catch (Exception $e) {
  print "Couldn't create the drink: " . $e->getMessage();
}

?>

