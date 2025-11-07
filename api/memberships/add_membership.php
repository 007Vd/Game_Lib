<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['membership_id']) || !isset($data['type'])) sendResponse("error","membership_id and type required");
$sql="INSERT INTO Memberships (membership_id, type, monthly_fee, rental_limit) VALUES (?, ?, ?, ?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("isdi",$data['membership_id'],$data['type'],$data['monthly_fee'],$data['rental_limit']);
if($stmt->execute()) sendResponse("success","Membership added");
else sendResponse("error","Add failed: ".$stmt->error);
?>
