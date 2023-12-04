<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "new_oee_calculator"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?>