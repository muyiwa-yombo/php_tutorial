<?php 

class Person{
    public $name,$surname,$age;
    private $mantra;
    public static $counter;

    public function __construct($fname,$sname,$age){
        $this->name=$fname;
        $this->surname=$sname;
        $this->age=$age;
        self::$counter++;
    }

    public function setMantra($mantra){
        $this->mantra=$mantra;
    }
    public function getMantra(){
        return $this->mantra;
    }

    public static function getCounter(){
        return self::$counter;
    }
  
}





?>