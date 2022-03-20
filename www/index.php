<?php
// array
// Indexed array
$items = array();
array_push($items, "apples");
array_push($items, "oranges");
print_r($items);
echo "<br>";
// Associative array
$car = array();
$car['make'] = 'Toyota';
$car['model'] = 'Camry';
$car['year'] = '2021';
print_r($car);
echo "<br>";
// First item is Apples
echo "First item is " . $items[0];
echo "<br>";
// The car make is Toyota
echo "The car make is " . $car["make"];
?>
