



<?php
$first_name = "Василь";
$last_name = "Арджихам";
$year_of_birth = 1990;
$current_year = date("Y");
$age = $current_year - $year_of_birth;
echo "<p>Повне ім'я: $first_name $last_name, Вік: $age років</p>";



$countries = ["Україна", "Польща", "Німеччина", "Румунія"];
echo "<ol>";
foreach ($countries as $country) {
    echo "<li>$country</li>";
}
echo "</ol>";







$cities = [
    "Київ" => 2800000,
    "Львів" => 720000,
    "Харків" => 1400000,
    "Одеса" => 1010000
];

echo "<p>Міста з населенням понад 1 млн:</p><ul>";
foreach ($cities as $city => $population) {
    if ($population > 1000000) {
        echo "<li>$city ($population)</li>";
    }
}
echo "</ul>";








$number = 8;
echo "<p>Число $number - " . ($number % 2 == 0 ? "Парне" : "Непарне") . "</p>";








$year = date("Y");
$is_leap = ($year % 4 == 0) ? "це високосний рік" : "не є високосним роком";
echo "<p>Поточний рік $year - $is_leap</p>";
?>
