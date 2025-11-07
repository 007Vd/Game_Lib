<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['rental_id'])) sendResponse("error","rental_id required");
$sql="UPDATE Rentals SET return_date=?, status=? WHERE rental_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("ssi",$data['return_date'],$data['status'],$data['rental_id']);
if($stmt->execute()) sendResponse("success","Rental updated");
else sendResponse("error","Update failed: ".$stmt->error);
?>
