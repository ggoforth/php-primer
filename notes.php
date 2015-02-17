<?php

require('helpers.php');
require('traits.php');

use geekwise as g;

// execution of php, web request lifecycle
// all lines end with ;

// variables
// - prfixed with $ sign
// - are mutable
// - are not typed
$string = 'this is a string';
$array = array(1, 2, 3);
$arrayLiteral = [1, 2, 3];
$assocArray = ['foo' => 'bar', 'baz' => 'bleep'];
$object = new stdClass;
$object->geekwise = 'academy';

g\logger($string);
g\logger($array);
g\logger($arrayLiteral);
g\logger($assocArray);
g\logger($object);
g\logger($assocArray['foo']);

//control flow
// if 
// if / else
// if / else if / else
// switch
// for
// foreach
// while
if (true) {
    g\logger('true is true');
}

if (false) {
    g\logger('false is not true');
} else {
    g\logger('else is happenin');
}

//switch
$thing = 'foo';

switch ($thing) {
    case '0':
        g\logger('we are in case 0');
        break;
    case '1':
        g\logger('we are in case 1');
        break;
    case '2':
        g\logger('we are in case 2');
        break;
    case '3':
        g\logger('we are in case 3');
        break;
    case 'foo':
        g\logger('we are in case foo');
        break;
    default:
        g\logger('this is the default case');
}

//simple for loop
$output = '';
for ($i = 0; $i < 20; $i++) {
//    $output .= "iteration $i\n";
    $output .= sprintf("interation is %s\n", $i) ;
}
g\logger($output);

//foreach is for iterating arrays
foreach (['foo', 'bar', 'baz'] as $loopItem) {
    g\logger($loopItem); //should log a string
}

foreach (['foo' => 'bar', 'baz' => 'bleep'] as $key => $val) {
    g\logger($key . " is equal to " . $val); //should log a string
}

//while loop
$i = 5;
while ($i) {
    $i--;
    g\logger("We are on iteration $i of this while loop");
}

//functions
// - function keyword followed by the function name
// - default parameter values
// - calling a function
// - return values
function prefixedClassNames($className = 'foo', $prefix = 'geekwise') {
    return $prefix . '-' . $className;
}
$className2 = prefixedClassNames();
g\logger($className2);
$className = prefixedClassNames('academy');
g\logger($className);
g\logger(prefixedClassNames('academy', 'bitwise'));

//classes
// - class instances are what we refer to as objects
// - use the new keyword to create a class instance
// - similar to javascript
// - constructors - called when a new class is created
// - traits
// - $this keyword
class Geekwise {

    public function academy() {
        g\logger('this is the academy function in the Geekwise class');
    }

}

$geeks = new Geekwise;
$geeks->academy();

//constructors
class Movie {

    public function __construct($title = null, $runningTime = null, $year = null) {
        $this->title = is_null($title) ? 'n/a' : $title;
        $this->runningTime = is_null($runningTime) ? 'n/a' : $runningTime;
        $this->year = is_null($year) ? 'n/a' : $year;
    }

    public function summary() {
        return sprintf('The movie %s was released in %s and has a running time of %s minutes.', $this->title, $this->year, $this->runningTime);
    }

}

$movie = new Movie('Rad', '90', '1989');
g\logger($movie->summary());

//traits
class Teacher {

    use GeekwiseAcademyTeacher;

}
//
$teacher = new Teacher;
g\logger($teacher->teach('php'));

//Extending classes
Class GeekwiseTeacher extends Teacher {

    public function teachBootcamp() {
        return 'I am going to teach you about html and css';
    }

    public function teach($what = null) {
        $firstTeacher = parent::teach($what);
        return $firstTeacher . " Have a good day!";
    }

}
//
$geekTeacher = new GeekwiseTeacher;
g\logger($geekTeacher->teachBootcamp());
g\logger($geekTeacher->teach('php'));

//interfaces
interface GeekwiseAcademyTeacherInterface {
    public function teach();
    public function homework();
    public function recess();
}

class GACTeacher implements GeekwiseAcademyTeacherInterface {
    public function teach() {

    }

    public function homework() {

    }
    public function recess() {

    }
}

$gacTeacher = new GACTeacher;

