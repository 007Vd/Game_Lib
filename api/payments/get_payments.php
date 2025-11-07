<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$res=$conn->query("SELECT * FROM Payments ORDER BY payment_date DESC");
$rows=[];
while($r=$res->fetch_assoc()) $rows[]=$r;
sendResponse("success","Payments fetched",$rows);
?>
