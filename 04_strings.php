<?php

// Create simple string
$name= 'muyiwa';
$string2= 'hello i am '.$name." i am 22";
$string='hello '.$name;

echo $string."<br>";
echo $string2."<br>";
// String concatenation
echo "hello "."i am muyiwa"." this is php<br>";
// String functions
$string ="hello world";
//length of words in the string
echo "1- ".strlen($string)."<br>";
//removes the white spaces from the word 
echo "2- ".trim($string)."<br>";
//removes the white spaces from the left side of the word
echo "3- ".ltrim($string)."<br>";
//removes white spaces from the right side of the word
echo "4- ".rtrim($string)."<br>";
//shows the number of words 
echo "5- ".str_word_count($string)."<br>";
//reverses the string values
echo "7- ".strrev($string)."<br>";
//transforms the string to upper case
echo "8- ".strtoupper($string)."<br>";
//transforms the string to lower case
echo "9- ".strtolower($string)."<br>";
//transforms the first letter of the string to upper case
echo "10- ".ucfirst($string)."<br>";
//used to get the position of the compared string
echo "11- ".strpos($string, "world")."<br>";
//transdforms the first letter of the string to lower case
echo "12- ".lcfirst("HELLO")."<br>";
//shows the index position of the string
echo "13- ".stripos($string, "world")."<br>";
//trims the string from the specified index position
echo "14- ".substr($string,8)."<br>";
//replaces the string with another specified string
echo "15- ".str_replace("world","php",$string)."<br>";
//
echo "16- ".str_ireplace("world","php",$string)."<br>";
// Multiline text and line breaks
$longtext="
    hi i am learning php
    i am 22,
    i love coding
";
echo $longtext."<br>";
echo nl2br($longtext)."<br>";
// Multiline text and reserve html tags

// https://www.php.net/manual/en/ref.strings.php

?>