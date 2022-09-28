<?php

$servername ="localhost:3308";
$username ="root";
$password ="";
$db = "lastone";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn){
    die("connection failed :".mysqli_connect_error());
    
    
}
else{
    echo '';
}
