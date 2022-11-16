<?php
include "../vendor/connect.php";

class Film
{

    public $id, $name, $year, $user_id, $format;

    public function __construct($id)
    {
        $this->id = $id;
        include ('..\vendor\connect.php');
        $films = mysqli_query($connect, "SELECT * FROM `films` WHERE `id` = '$id'");
        if (mysqli_num_rows($films) > 0) {
            
            $film = mysqli_fetch_assoc($films);
            $this->name = $film['name'];
            $this->year = $film['year'];
            $this->user_id = $film['user_id'];
            $this->format = $film['format'];
        } else {
            header('Location: /vendor/film_list.php');
        }
    }

    public function get_actors()
    {
        include ('..\vendor\connect.php');
        $sql = "SELECT * FROM `films_actors` JOIN `actors` ON films_actors.actor_id=actors.id WHERE film_id = '$this->id'";
        $actors = mysqli_query($connect, $sql);
        $array = [];
        if (mysqli_num_rows($actors) > 0) {
            while ($row = mysqli_fetch_assoc($actors)) {
                $array[] = $row;
            }
        }
        return ($array);
    }

    public function delete()
    {
        include ('..\vendor\connect.php');
        $sql = "DELETE FROM `films` WHERE `id` = '$this->id'";
        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) {
            return false;
        } else {
            return true;
        }
    }
}
?>