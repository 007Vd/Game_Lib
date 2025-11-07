<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['dev_id']) || !isset($data['dev_name'])) sendResponse("error","dev_id and dev_name required");
$sql = "UPDATE Developers SET dev_name=?, country=? WHERE dev_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $data['dev_name'], $data['country'], $data['dev_id']);
if ($stmt->execute()) sendResponse("success","Developer updated");
else sendResponse("error","Update failed: ".$stmt->error);
?>
