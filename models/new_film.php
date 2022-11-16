<?php

class New_film
{

    public $id, $name, $year, $user_id, $format;

    public function __construct()
    {
        $this->name = '';
        $this->year = '';
        $this->user_id = $_SESSION['user']['id'];
        $this->format = '';
    }

    public function save()
    {
        include ('..\vendor\connect.php');
        
        $add = mysqli_query($connect, "INSERT INTO `films` (`id`, `name`, `year`, `format`,`user_id`) VALUES (NULL,'$this->name',' $this->year', '$this->format', '$this->user_id')");
        if (mysqli_errno($connect)) {
            return false;
        } else {
            return mysqli_insert_id($connect);
        }
    }
}
?>