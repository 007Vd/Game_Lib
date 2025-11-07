<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['genre_id'])) sendResponse("error", "genre_id required");
$sql = "DELETE FROM Genres WHERE genre_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $data['genre_id']);
if ($stmt->execute()) sendResponse("success", "Genre deleted");
else sendResponse("error", "Delete failed: " . $stmt->error);
?>
