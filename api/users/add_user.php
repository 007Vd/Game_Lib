<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
$required = ['user_id','name','email'];
foreach($required as $f) if(!isset($data[$f])) sendResponse("error","$f required");

$sql="INSERT INTO Users (user_id, name, email, phone, membership_id, join_date) VALUES (?, ?, ?, ?, ?, ?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("isssis",$data['user_id'],$data['name'],$data['email'],$data['phone'],$data['membership_id'],$data['join_date']);
if($stmt->execute()) sendResponse("success","User added");
else sendResponse("error","Add failed: ".$stmt->error);
?>
