<?php

// What is a variable
//a container 
// Variable types
//boolean
//string 
//integer
//float
//double
//object
//array

// Declare variables
$name = "muyiwa";
$age = "twenty-eight";
$isMale = true;
$height = 1.85;
$salary = null;
// Print the variables. Explain what is concatenation
echo $name;
echo "<br>" . $age;

echo "<br>" . $isMale;

echo "<br>" . $height;

echo "<br>" . $salary;

//dummie example
// if(gettype($age)==="integer"){
//     echo "age is an integer";
// }else{
//     echo "age is not an integer";
// }

// Print types of the variables
echo gettype($height). "<br>";
echo gettype($name). "<br>";
echo gettype($age). "<br>";
echo gettype($isMale). "<br>";
echo gettype($salary). "<br>";

// Print the whole variable
var_dump($name, $age, $height, $salary, $isMale);
// Change the value of the variable
$name = false;

// Print type of the variable
echo gettype($name)."<br>";
// Variable checking functions
is_string($name). "<br>";
is_int($age). "<br>";
is_bool($isMale). "<br>";
is_float($salary). "<br>";
// Check if variable is defined
isset($age);
isset($name);
// Constants
define('PI',3.14);
echo PI."<br>";
// Using PHP built-in constants

?>