<?php
$host = "localhost";
$user = "root";
$pass = ""; // RENU,PUT YOUR PASSWORD HERE
$dbname = "mydbs";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}
?>
