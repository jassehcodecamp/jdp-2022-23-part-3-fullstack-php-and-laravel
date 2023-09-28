<?php

include './DBConnection.php';

class Todo
{
    public $id;
    public $description;
    public $completed = false;

    public function __construct($description)
    {
        $this->id = uniqid();
        $this->description = $description;
    }

    public function markCompleted()
    {
    }

    public function markInCompleted()
    {
    }
    public function store()
    {

    }

    public function update($description)
    {

    }

    public function delete()
    {

    }

    public static function find($id)
    {

        $db = (new DBConnection());
        return $db->fetch('todos', $id);

    }

    public static function get()
    {
        $db = (new DBConnection());
        return $db->fetchAll('todos');
    }
}
