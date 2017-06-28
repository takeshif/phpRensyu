<?php

class Entree {
  private $name;
  protected $ingredients = array();

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

class ComboMeal extends Entree {
  public function __construct($name,$entrees) {
  parent::__construct($name,$entrees);
  foreach ($entrees as $entree) {
      if (! $entree instanceof Entree) {
        throw new Exception('Elements of $entrees must be Entree objects');
      }
    }
  }

  public function hasIngredient($ingredient) {
    foreach ($this->ingredients as $entree) {
      if ($entree->hasIngredient($ingredient)) {
        return true;
      }
    }
    return false;
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


// セット料理
$combo = new ComboMeal('Soup + Sandwitch', array($soup, $sandwich));

foreach (['chikcken','water','pickles'] as $ing) {
  if ($combo->hasIngredient($ing)) {
    print "Something i the combo contains $ing.\n";
  }
}

?>

