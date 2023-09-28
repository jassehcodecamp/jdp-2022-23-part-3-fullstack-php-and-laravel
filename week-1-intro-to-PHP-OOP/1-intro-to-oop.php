<?php

/*
- Classes
- Properties
- Methods
- Constructor Method ( a PHP magic method. And all magic methods starts with __ (double underscores))
- Object
*/
class Student
{
    public $name;
    public $email;
    public $scores = [];

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function addScore(float $score): void
    {
        // $this->scores[] = $score;
        array_push($this->scores, $score);
    }
}


// create an object (instance) from the Student Class
$studentOne = new Student("Peter", "peter@jcc.com");
$studentTwo = new Student("Mahmud", "baka@jcc.com");

// var_dump($studentOne, $studentTwo);

echo $studentOne->name . PHP_EOL;
echo $studentTwo->name . PHP_EOL;

$studentOne->addScore(89);
$studentOne->addScore(70);

var_dump($studentOne->scores);
