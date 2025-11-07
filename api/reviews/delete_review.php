<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$data=json_decode(file_get_contents("php://input"), true);
if(!isset($data['review_id'])) sendResponse("error","review_id required");
$sql="DELETE FROM Reviews WHERE review_id=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("i",$data['review_id']);
if($stmt->execute()) sendResponse("success","Review deleted");
else sendResponse("error","Delete failed: ".$stmt->error);
?>
