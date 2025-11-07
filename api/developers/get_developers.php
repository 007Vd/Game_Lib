<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$sql = "SELECT * FROM Developers";
$res = $conn->query($sql);
$rows = [];
while($r=$res->fetch_assoc()) $rows[] = $r;
sendResponse("success","Developers fetched",$rows);
?>
