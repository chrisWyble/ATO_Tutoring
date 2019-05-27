<?php
$servername = "localhost";
$username = "id9634624_master";
$password = "i!^cLRc5$1XbZwkw1yd6";

try {
    $conn = new PDO("mysql:host=$servername;dbname=id9634624_ato_tutoring_database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>