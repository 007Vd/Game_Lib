<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['membership_id'])) sendResponse("error","membership_id required");
$sql="UPDATE Memberships SET type=?, monthly_fee=?, rental_limit=? WHERE membership_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("sdii",$data['type'],$data['monthly_fee'],$data['rental_limit'],$data['membership_id']);
if($stmt->execute()) sendResponse("success","Membership updated");
else sendResponse("error","Update failed: ".$stmt->error);
?>
