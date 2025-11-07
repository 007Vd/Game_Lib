<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
$required=['user_id','game_id','rental_date'];
foreach($required as $f) if(!isset($data[$f])) sendResponse("error","$f required");
$sql="INSERT INTO Rentals (user_id, game_id, rental_date, return_date, status) VALUES (?, ?, ?, ?, ?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("iisss",$data['user_id'],$data['game_id'],$data['rental_date'],$data['return_date'],$data['status']);
if($stmt->execute()) sendResponse("success","Rental added","insert_id: ".$stmt->insert_id);
else sendResponse("error","Add failed: ".$stmt->error);
?>
