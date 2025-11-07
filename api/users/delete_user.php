<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['user_id'])) sendResponse("error","user_id required");
$sql="DELETE FROM Users WHERE user_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i",$data['user_id']);
if($stmt->execute()) sendResponse("success","User deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
