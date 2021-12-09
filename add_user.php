<?php

//CHECK DB CONNECTION
$mysql = new mysqli('localhost', 'root', '', 'fullstack');

if($mysql->connect_error) {
    die($mysql->connect_error);
}

// CREATE A QUERY
$name = $_POST['name'];
$login = $_POST['login'];
$age = $_POST['age'];
        
$query = "INSERT INTO users (name, login, age) VALUES ('$name', '$login', '$age')"; //insert values into DB
$mysql->query($query); //create a query

header('location: index.php'); //return to homepage


?>