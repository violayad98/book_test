<?php
session_start();

if (empty($_SESSION['user'])) {
    header('Location: /views/login.php');
} else {
    header('Location: /vendor/film_list.php');
}

?>
