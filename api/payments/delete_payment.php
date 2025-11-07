<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['payment_id'])) sendResponse("error","payment_id required");
$sql="DELETE FROM Payments WHERE payment_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i",$data['payment_id']);
if($stmt->execute()) sendResponse("success","Payment deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
