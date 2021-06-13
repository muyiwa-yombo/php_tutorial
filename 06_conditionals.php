<?php

$age = 25;
$salary = 300000;

// Sample if
if($age ===20){
    echo '1'.'<br>';
}
// Without circle braces
if ($age ===20) echo '1'.'<br>';
// Sample if-else
if($age >20){
    echo '1'.'<br>';
}else{
    echo '2'.'<br>';
}
// Difference between == and ===
if($age==20){
    echo '1'.'<br>';
}

// if AND
if($age ==20 && $salary ===300000){
    echo 'do something'.'<br>';
}
// if OR
if ($age ==20 || $salary ===200000){
    echo 'it has done something'.'<br>';
}
// Ternary if
echo $age <22 ? 'young' :'old';
// Short ternary
$myage=$age ?:18;
echo '<pre>';
var_dump($myage);
echo '</pre>';
// Null coalescing operator
 echo $myname=isset($name) ?$name :'muyiwa' .'<br>';
// switch
$userRole='admin';

switch($userRole){
    case 'admin':
        echo 'welcome admin';
        break;
    case 'user':
        echo 'welcome user';
        break;
    case 'editor':
        echo 'welcome editor';
    default:
        echo 'your role no dey here oo';

}
?>