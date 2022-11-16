<?php
include "../vendor/connect.php";

class Actors
{

    public $id, $name;

    public function __construct($name)
    {
        $this->name = trim($name);
    }

    public function get_id()
    {
        include ('..\vendor\connect.php');
        
        $sql = "INSERT INTO actors (name) VALUES ('$this->name') ON DUPLICATE KEY UPDATE id = LAST_INSERT_ID(id);";
        $actors = mysqli_query($connect, $sql);
        return (mysqli_insert_id($connect));
    }
}

?>