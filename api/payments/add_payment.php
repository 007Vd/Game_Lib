<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
$req=['user_id','amount','payment_date','payment_type'];
foreach($req as $f) if(!isset($data[$f])) sendResponse("error","$f required");
$sql="INSERT INTO Payments (user_id, amount, payment_date, payment_type) VALUES (?, ?, ?, ?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("idss",$data['user_id'],$data['amount'],$data['payment_date'],$data['payment_type']);
if($stmt->execute()) sendResponse("success","Payment recorded");
else sendResponse("error","Add failed: ".$stmt->error);
?>
