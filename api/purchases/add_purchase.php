<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
$req=['user_id','game_id','purchase_date','price'];
foreach($req as $f) if(!isset($data[$f])) sendResponse("error","$f required");
$sql="INSERT INTO Purchases (user_id, game_id, purchase_date, price) VALUES (?, ?, ?, ?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("iisd",$data['user_id'],$data['game_id'],$data['purchase_date'],$data['price']);
if($stmt->execute()) sendResponse("success","Purchase recorded");
else sendResponse("error","Add failed: ".$stmt->error);
?>
