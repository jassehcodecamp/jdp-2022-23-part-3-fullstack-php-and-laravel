<?php

// Variables - the idea of storing values to containers which are identified by names, and can be used/reference in our program as much as we wish.

// To create a variable in PHP you have to start with a $ (dollar symbol), preceeded any number of alphabets or underscore (_). It can have a number in between, and can also end with a number as well.

$greet = "Hello World!";

$_test = "a test variable";

$greet2 = "Hello World 2";


/*
echo $greet;

echo "<br>";

echo $_test;

echo "<br>";

echo $greet2;
*/

// Data Types: This refers to the categories of values/data that we can manipulate in our program.

// Value: this is the smallest unit of data you can have in your progam.

// In PHP we have about 9 different Data Types:


/*
  1. NULL ==>    this refers to the absence of a value. There is only one single value for the NULL data type, which is also null

  2. Boolean ==> we have only two values in this type - true or false. These values are case in-sensitve. Meaning we can write it as TRUE, True, or true. But you are recommended to stick to one convention, and in our case, we are going to use true.

  3. Integers ==> Any positive and non-positive whole number. Eg: 1, 2, 3, -10

  4. Floats ==> Any positive and non-positive decimal number. Eg: 1.6, 0.5, -10.0

  5. Strings => A sequence of characters in either single or double quotes. Eg: 'Hello World', "The PHP Developer"

  6. Arrays ===> A collection of ordered items. These items can be values from any of the PHP data types.

  7. Objects ==> A key-value pair data structure, usually contains a bunch of properties and methods.

  8. Callables =>

  9. Resources ==>
  */


// String
$courseName = 'PHP & Laravel Course';

$intro = 'I\'m a PHP Developer';

$intro = "I'm a PHP Developer";

// Integers
$courseDuration = 16;

// Float
$passMark = 60.66;

// Boolean
$isForBeginners = false;

// Array
$technogies = ['PHP', 'Laravel', 'MySQL', 'Apache'];

// Null
$passRate = null;

// PHP Class
class Student
{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

}


// create a student object from the Student Class
$studentOne = new Student('Mahmud', 'Jatta');
// echo $studentOne;

// Shorthand Echo Statement
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1><?php echo $greet; ?></h1>

    <p>I am doing <strong><?= $courseName ?></strong></p>

    <p>Below are the Technologies we are going to learn in this course:</p>
    <ul>
      <!-- Todo: write a PHP loop statement that will echo the values of $technologies -->
       
      <?php
      /*
        foreach($technogies as $technology) {
            echo "<li><strong>$technology</strong></li>";
        }
        */
?>
      <?php foreach($technogies as $technology) { ?>
        <li><strong><?= $technology ?></strong></li>
      <?php } ?>
    </ul>

    <p><?= $studentOne->fullName() ?></p>
    <p><?php var_dump($technogies) ?></p>

    <p><?php var_dump($studentOne) ?></p>
    
    <a href="/">Back To Home</a>
  </body>
</html>
