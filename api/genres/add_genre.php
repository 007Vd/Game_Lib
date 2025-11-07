<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['genre_id']) || !isset($data['genre_name'])) {
    sendResponse("error", "genre_id and genre_name required");
}
$genre_id = $data['genre_id'];
$genre_name = $data['genre_name'];

$sql = "INSERT INTO Genres (genre_id, genre_name) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $genre_id, $genre_name);

if ($stmt->execute()) sendResponse("success", "Genre added");
else sendResponse("error", "Add failed: " . $stmt->error);
?>
