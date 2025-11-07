<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['genre_id']) || !isset($data['genre_name'])) {
    sendResponse("error", "genre_id and genre_name required");
}
$sql = "UPDATE Genres SET genre_name=? WHERE genre_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $data['genre_name'], $data['genre_id']);
if ($stmt->execute()) sendResponse("success", "Genre updated");
else sendResponse("error", "Update failed: " . $stmt->error);
?>
