<?php ob_start();
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database ="medical_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

error_reporting(0)
//echo "Connected successfully";
?>