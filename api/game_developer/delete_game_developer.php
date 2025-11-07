<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['game_id']) || !isset($data['dev_id'])) sendResponse("error","game_id and dev_id required");
$sql="DELETE FROM Game_Developer WHERE game_id=? AND dev_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("ii",$data['game_id'],$data['dev_id']);
if($stmt->execute()) sendResponse("success","Relation deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
