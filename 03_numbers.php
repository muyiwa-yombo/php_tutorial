<?php

// Declaring numbers
$a=5;
$b=4;
$c=1.2;


// Arithmetic operations
echo ($a + $b) *$c;
echo $a - $b."<br>"; 
echo $a * $b."<br>"; 
echo $a / $b."<br>" ; 
echo $a % $b."<br>";  
// Assignment with math operators
$a +=$b;
echo $a."<br>";
// Increment operator
echo "this is a ".$a++."<br>";
echo $a."<br>";
echo " this is the second a".++$a."<br>";

// Decrement operator
echo "this is a ".$a--."<br>";
echo $a."<br>";
echo " this is the second a".--$a."<br>";

// Number checking functions
is_double(1.25);
is_int(1);
is_numeric(3.45);
// Conversion
$strnumber ="22";
$number=intval($strnumber);
var_dump($number);
// Number functions

// Formatting numbers

// https://www.php.net/manual/en/ref.math.php
?>