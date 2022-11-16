<?php
$connect = mysqli_connect('localhost', 'root', '', 'films');

if (! $connect) {
    die('Error connect to DataBase');
}