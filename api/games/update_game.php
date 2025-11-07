<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['game_id'])) sendResponse("error","game_id required");
$sql="UPDATE Games SET title=?, platform=?, release_year=?, price=?, availability=?, avg_rating=?, genre_id=? WHERE game_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("ssidssii",$data['title'],$data['platform'],$data['release_year'],$data['price'],$data['availability'],$data['avg_rating'],$data['genre_id'],$data['game_id']);
if($stmt->execute()) sendResponse("success","Game updated");
else sendResponse("error","Update failed: ".$stmt->error);
?>
