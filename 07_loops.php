<?php

// while

// Loop with $counter
$counter=0;
// while($counter <10){
//     echo 'welcome'.'<br>'; 
//     $counter++;    
// }
// do - while
// do{
//     echo 'you are in the do block <br>';
//     $counter++;
// }while($counter < 5);
// for
for($i =0;$i<10;$i++){
    echo $i.'<br>';
}
// foreach
$names=['muyiwa','yombo'];

foreach ($names as $i=> $names){
    echo $i." ".$names.' <br>';
}
// Iterate Over associative array.
$person_obj=[
    'name' =>"muyiwa",
    'surname' => "yombo",
    'age' =>25,
    'hobbies' => ["football","coding"]
];

foreach ($person_obj as $i => $person_obj ){
    if(is_array($person_obj)){
        echo $i." :".implode(",",$person_obj)." <br>";
    }else{
    echo $i." :".$person_obj." <br>";
    }
}
