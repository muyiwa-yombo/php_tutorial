<?php

// Create array

//old way of defining an array
//$friuts=array();

$friuts = ["banana", "apple", "orange"];

// Print the whole array
echo '<pre>';
var_dump($friuts);
echo '</pre>';
// Get element by index
echo $friuts[1] . '<br>';
// Set element by index
$friuts[0] = 'watermelon';
echo '<pre>' . var_dump($friuts) . '</pre>';

// Check if array has element at index 2
isset($friuts[3]); //false
// Append element
$friuts[] = 'banana';
echo '<pre>' . var_dump($friuts) . '</pre>';
// Print the length of the array
echo count($friuts) . '<br>';
// Add element at the end of the array
array_push($friuts, 'plantain');
echo '<pre>' . var_dump($friuts) . '</pre>';
// Remove element from the end of the array
echo array_pop($friuts);
echo '<pre>' . var_dump($friuts) . '</pre>';
// Add element at the beginning of the array
array_unshift($friuts, 'eggs');
echo '<pre>' . var_dump($friuts) . '</pre>';
// Remove element from the beginning of the array
array_shift($friuts);
echo '<pre>' . var_dump($friuts) . '</pre>';
// Split the string into an array
$string = 'banana,apple,goat';

echo '<pre>' . var_dump(explode(',', $string)) . '</pre>';
// Combine array elements into string
echo implode(",", $friuts) . '<br>';
// Check if element exist in the array
echo '<pre>' . var_dump(in_array('watermelon', $friuts)) . '</pre>';

// Search element index in the array
echo '<pre>' . var_dump(array_search('mango', $friuts)) . '</pre>';
// Merge two arrays
$names = ["muyiwa", "yombo", "jefferson"];
echo '<pre>' . var_dump(array_merge($names, $friuts)) . '</pre>';
// var_dump([...$friuts,...$names]);
// Sorting of array (Reverse order also)
echo '<pre>' . var_dump($friuts) . '</pre>';
sort($friuts);
echo '<pre>' . var_dump($friuts) . '</pre>';


// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays
// ============================================

// Create an associative array
$person_obj=[
    'name' =>"muyiwa",
    'surname' => "yombo",
    'age' =>25,
    'hobbies' => ["football","coding"]
];
echo '<pre>'.var_dump($person_obj).'</pre>';
// Get element by key
echo $person_obj['name'].'<br>' ;
// Set element by key
$person_obj['job']= 'software developer';
echo '<pre>'.var_dump($person_obj).'</pre>';
// Null coalescing assignment operator. Since PHP 7.4
if(!isset($person_obj['address'])){
    $person_obj['address']='unknown';
    echo '<pre>'.var_dump($person_obj).'</pre>';
}

// Check if array has specific key
echo isset($person_obj['house']).'<br>';
// Print the keys of the array

echo '<pre>'.var_dump(array_keys($person_obj)).'</pre>';
// Print the values of the array
echo '<pre>'.var_dump(array_values($person_obj)).'</pre>';
// Sorting associative arrays by values, by keys
ksort($person_obj);
echo '<pre>'.var_dump($person_obj).'</pre>';
asort($person_obj);
echo '<pre>'.var_dump($person_obj).'</pre>';



// Two dimensional arrays
$todos =[
    [
        'title' =>'todo title1',
         'completed' =>true,
    ],
    [
        'title2' =>'todo title1',
         'completed' =>false,
    ]
    ];
    echo '<pre>'.var_dump($todos).'</pre>';
