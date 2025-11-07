<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
$req=['game_id','title'];
foreach($req as $f) if(!isset($data[$f])) sendResponse("error","$f required");
$sql="INSERT INTO Games (game_id, title, platform, release_year, price, availability, avg_rating, genre_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("issidsdi",$data['game_id'],$data['title'],$data['platform'],$data['release_year'],$data['price'],$data['availability'],$data['avg_rating'],$data['genre_id']);
if($stmt->execute()) sendResponse("success","Game added");
else sendResponse("error","Add failed: ".$stmt->error);
?>
