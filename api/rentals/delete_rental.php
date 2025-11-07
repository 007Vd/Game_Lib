<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['rental_id'])) sendResponse("error","rental_id required");
$sql="DELETE FROM Rentals WHERE rental_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i",$data['rental_id']);
if($stmt->execute()) sendResponse("success","Rental deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
