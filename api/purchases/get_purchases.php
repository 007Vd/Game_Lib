<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$res=$conn->query("SELECT * FROM Purchases ORDER BY purchase_date DESC");
$rows=[];
while($r=$res->fetch_assoc()) $rows[]=$r;
sendResponse("success","Purchases fetched",$rows);
?>
