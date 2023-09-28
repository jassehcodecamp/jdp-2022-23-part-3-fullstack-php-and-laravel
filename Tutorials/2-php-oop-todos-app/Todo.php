<?php

class Todo
{
    public $id;
    public $description;
    public $completed = false;

    public function __construct($description)
    {
        $this->id = uniqid();
        $this->description = $description;
        // $this->completed = false;
    }

    public function markCompleted()
    {
    }

    public function markInCompleted()
    {
    }

    public function updateTodo($description)
    {

    }
}

$todo = new Todo('Attend PHP & Laravel class');
var_dump($todo);
