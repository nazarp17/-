<?php


// Завдання 1
$first_name = "Василь";
$last_name = "Бардшхала";
$year_of_birth = 2003;
$current_year = date("Y");
$age = $current_year - $year_of_birth;

echo "// Завдання 1\n";
echo "Повне ім'я: $first_name $last_name\n";
echo "Вік: $age\n\n";

// Завдання 2
echo "// Завдання 2\n";
$countries = ["Україна", "Франція", "Канада", "Японія"];
echo "<ol>\n";
foreach ($countries as $country) {
    echo "<li>$country</li>\n";
}
echo "</ol>\n\n";

// Завдання 3:
echo "// Завдання 3\n";
$cities = [
    "Київ" => 2967000,
    "Львів" => 721301,
    "Харків" => 1441000,
    "Одеса" => 1014000
];

foreach ($cities as $city => $population) {
    if ($population > 1000000) {
        echo "$city: $population мешканців\n";
    }
}
echo "\n";

 
echo "// Завдання 4\n";
$number = 8;
if ($number % 2 == 0) {
    echo "$number — Парне\n";
} else {
    echo "$number — Непарне\n";
}
echo "\n";


echo "// Завдання 5\n";
$year = date("Y");
if ($year % 4 == 0) {
    echo "$year — Високосний рік\n";
} else {
    echo "$year — Не високосний рік\n";
}
?>