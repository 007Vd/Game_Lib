<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['membership_id'])) sendResponse("error","membership_id required");
$sql="DELETE FROM Memberships WHERE membership_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i",$data['membership_id']);
if($stmt->execute()) sendResponse("success","Membership deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
