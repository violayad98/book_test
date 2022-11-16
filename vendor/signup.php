<?php
session_start();
require_once 'connect.php';
if (empty($_POST)) {
    header('Location: /vendor/film_list.php');
}

$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$error_fields = [];

if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_login) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "This email is isset",
        "fields" => [
            'email'
        ]
    ];
    
    echo json_encode($response);
    die();
}

if ($password === $password_confirm) {
    
    $password = md5($password);
    
    mysqli_query($connect, "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL,'$email', '$password')");
    
    $response = [
        "status" => true,
        "message" => "Registration is good"
    ];
    echo json_encode($response);
} else {
    $response = [
        "status" => false,
        "message" => "Password and confirm password is not same",
        "fields" => [
            'password_confirm'
        ],
        "type" => 1
    ]
    ;
    echo json_encode($response);
}

?>
