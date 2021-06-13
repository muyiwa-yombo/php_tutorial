<?php

// Function which prints "Hello I am Zura"

// function hello(){

//     echo 'hello i am muyiwa';
// }
// hello();
// Function with argument
function hello($name)
{
    return 'hello i am ' . $name . '<br>';
}
echo hello('muyiwa');
echo hello('becca');
echo hello('feyi');
// Create sum of two functions
// function sum($a, $b)
// {
//     return $a + $b;
// }
// echo sum(4,5);
// Create function to sum all numbers using ...$nums
function sum(...$nums)
{
    $sum = 0;
    foreach ($nums as $nums) {
        $sum +=$nums;
    }
    return $sum;
}
// echo sum(1, 2, 3, 4, 5);
// Arrow functions
// function sum(...$nums)
// {
//     return array_reduce($nums,fn($carry,$n) =>$carry +$n);
// }
echo sum(1, 2, 3, 4, 5);
