<?php

$mysql = new mysqli('localhost', 'root', '', 'fullstack');

if($mysql->connect_error) {
    die($mysql->connect_error);
}

echo 'Connected to DB';

?>