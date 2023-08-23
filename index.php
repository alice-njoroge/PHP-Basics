<?php
require "functions.php";

class Person {
    public $name;
    public $age;

    function breath(){
      echo  $this->name . " is breathing";
    }
}

$person = new Person();
$person->name = "John Doe";

$person->breath();
