<?php
session_start();
require_once 'connect.php';
if (empty($_POST)) {
    header('Location: /vendor/film_list.php');
}
$email = $_POST['email'];
$password = $_POST['password'];
$error_fields = [];

if ($email === '') {
    $error_fields[] = 'email';
}

if ($password === '') {
    $error_fields[] = 'password';
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
$password = md5($password);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {
    
    $user = mysqli_fetch_assoc($check_user);
    
    $_SESSION['user'] = [
        "id" => $user['id'],
        "email" => $user['email']
    ];
    
    $response = [
        "status" => true
    ];
    
    echo json_encode($response);
} else {
    
    $response = [
        "status" => false,
        "message" => 'Login or password is fail'
    ];
    
    echo json_encode($response);
}
?>
