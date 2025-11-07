<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$res = $conn->query("SELECT * FROM Memberships");
$rows=[];
while($r=$res->fetch_assoc()) $rows[]=$r;
sendResponse("success","Memberships fetched",$rows);
?>
