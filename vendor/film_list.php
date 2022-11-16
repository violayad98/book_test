<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: /views/login.php');
}

require_once '../models/film_list.php';

$film_list = new Film_list();
$array = $film_list->get_filter($_POST);

require_once '../views/film_list.php'; 