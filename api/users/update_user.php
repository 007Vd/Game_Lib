<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['user_id'])) sendResponse("error","user_id required");
$sql="UPDATE Users SET name=?, email=?, phone=?, membership_id=?, join_date=? WHERE user_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("sssisi",$data['name'],$data['email'],$data['phone'],$data['membership_id'],$data['join_date'],$data['user_id']);
if($stmt->execute()) sendResponse("success","User updated");
else sendResponse("error","Update failed: ".$stmt->error);
?>
