<?php

// What is class and instance
require_once "Person.php"; 
require_once "Student.php";
$person =new Person("muyiwa","yombo",23);
$person->setMantra("life is hard");
$person->getMantra();



echo '<pre>';
var_dump($person);
echo'</pre>';

$person2 =new Person("ibukun","yombo",25);
echo Person::getCounter();

echo '<pre>';
var_dump($person2);
echo'</pre>';
// Create Person class in Person.php

// Create instance of Person

// Using setter and getter