<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['dev_id']) || !isset($data['dev_name'])) sendResponse("error","dev_id and dev_name required");
$sql = "INSERT INTO Developers (dev_id, dev_name, country) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $data['dev_id'], $data['dev_name'], $data['country']);
if ($stmt->execute()) sendResponse("success","Developer added");
else sendResponse("error","Add failed: ".$stmt->error);
?>
