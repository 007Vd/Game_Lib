<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['game_id'])) sendResponse("error","game_id required");
$sql="DELETE FROM Games WHERE game_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i",$data['game_id']);
if($stmt->execute()) sendResponse("success","Game deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
