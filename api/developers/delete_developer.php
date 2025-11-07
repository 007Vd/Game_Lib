<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['dev_id'])) sendResponse("error","dev_id required");
$sql = "DELETE FROM Developers WHERE dev_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $data['dev_id']);
if ($stmt->execute()) sendResponse("success","Developer deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
