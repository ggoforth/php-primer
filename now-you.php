<?php

// your mission, should you choose to accept it is to:
// - create a new class, call it Car
// - make sure it has a constructor function that takes 3 arguments
//    - Make
//    - Model
//    - Year
// - Car should implement a drive function, that echos out "Car is driving!"
// - create another class that extends Car called MyCar
//    - It should use a constructor function and call to the parent::_construct class
//    - It's constructor should also take one argument, an array (associative array to be exact)
//    - Using that associative array, loop it's values and set them as properties of the class
//    - It should implement a details function that will echo out the make, model, and year.
// - Create an instance of the class
// - Call the drive function
// - Call the details function

class Car {

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function drive() {
        echo "car is driving\n";
    }

}

class MyCar extends Car {

    public function __construct($make, $model, $year, $properties = []) {
        parent::__construct($make, $model, $year);

        $this->properties = $properties;
        foreach ($properties as $property => $val) {
            $this->$property = $val;
        }
    }

    public function details () {
        echo sprintf("The make is %s, the model is %s, and the year is %s\n", $this->make, $this->model, $this->year);
    }

    public function otherDetails() {
        foreach ($this->properties as $propName => $propVal) {
            echo sprintf("The %s has a value of %s\n", $propName, $this->$propName);
        }
    }
}

$car = new MyCar('Honda', 'Accord', '2009', ['seats' => 'leather', 'radio' => 'siriusXm']);
$car->drive();
$car->details();
$car->otherDetails();
