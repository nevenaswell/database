<?php

//CHECK DB CONNECTION
$mysql = new mysqli('localhost', 'root', '', 'fullstack');

if($mysql->connect_error) {
    die($mysql->connect_error);
}

// CREATE A QUERY

$id = $_POST['id'];
        
$query = "DELETE FROM users WHERE id = $id"; //delete value from DB

$mysql->query($query); //create a query

header('location: index.php'); //return to homepage


?>