<?php
session_start();
$inipath = php_ini_loaded_file();
if (empty($_FILES['file'])) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Check fields"
    ]
    ;
    
    echo json_encode($response);
    
    die();
}
if (empty($_SESSION['user'])) {
    header('Location: /views/login.php');
}
require_once 'connect.php';
require_once '../models/actors.php';
require_once '../models/new_film.php';

$post_title = $_FILES['file']['name'];
$post_content = $_FILES['file']['tmp_name'];
$post_content1 = trim(file_get_contents($post_content));
$lines = explode("\n", $post_content1);
$films_info = array_chunk($lines, 5);

foreach ($films_info as $film_info) {
    
    $film = new New_film();
    $film->name = substr(stristr($film_info['0'], ': '), 1);
    $film->year = substr(stristr($film_info['1'], ': '), 1);
    $film->format = substr(stristr($film_info['2'], ': '), 1);
    $film->actors = explode(",", substr(stristr($film_info['3'], ': '), 1));
    $film_id = $film->save();
    if (! $film_id) {
        $response = [
            "status" => false,
            "message" => "Something wrong"
        ];
        echo json_encode($response);
        die();
    }
    foreach ($film->actors as $value) {
        $actor = new Actors($value);
        $actor_id = $actor->get_id();
        mysqli_query($connect, "INSERT INTO `films_actors` (`film_id`, `actor_id`) VALUES ('$film_id','$actor_id')");
    }
}
$response = [
    "status" => true,
    "message" => "Import is success"
];
echo json_encode($response);
die();
?>
