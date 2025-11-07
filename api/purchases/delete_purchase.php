<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['purchase_id'])) sendResponse("error","purchase_id required");
$sql="DELETE FROM Purchases WHERE purchase_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i",$data['purchase_id']);
if($stmt->execute()) sendResponse("success","Purchase deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
