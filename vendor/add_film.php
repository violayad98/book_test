<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: /views/login.php');
} elseif (empty($_POST)) {
    header('Location: /vendor/film_list.php');
}
require_once 'connect.php';
require_once '../models/actors.php';
require_once '../models/new_film.php';

$name = $_POST['name'];
$year = $_POST['year'];
$format = $_POST['format'];
$actors = $_POST['actors'];
$error_fields = [];

if ($name === '') {
    $error_fields[] = 'name';
}

if ($year === '') {
    $error_fields[] = 'year';
}
if ($format === '') {
    $error_fields[] = 'format';
}

if ($actors === '') {
    $error_fields[] = 'actors';
}

if (! empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Check fields",
        "fields" => $error_fields
    ];
    
    echo json_encode($response);
    
    die();
}
$actors_list = explode(",", $actors);

$film = new New_film();
$film->name = $name;
$film->year = $year;
$film->format = $format;
$film_id = $film->save();
if (! $film_id) {
    $response = [
        "status" => false,
        "message" => "Something wrong"
    ];
    
    echo json_encode($response);
    
    die();
}

foreach ($actors_list as $value) {
    $actor = new Actors($value);
    $actor_id = $actor->get_id();
    mysqli_query($connect, "INSERT INTO `films_actors` (`film_id`, `actor_id`) VALUES ('$film_id','$actor_id')");
}
$response = [
    "status" => true
];

echo json_encode($response);

?>
