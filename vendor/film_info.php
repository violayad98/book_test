<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: /views/login.php');
} elseif (empty($_GET['id'])) {
    header('Location: /vendor/film_list.php');
}
require_once '../models/film.php';

$film = new Film($_GET['id']);
$film->actors = $film->get_actors();

require_once '../views/film_info.php';

?>