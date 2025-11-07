<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");
$res=$conn->query("SELECT * FROM Game_Developer");
$rows=[];
while($r=$res->fetch_assoc()) $rows[]=$r;
sendResponse("success","Game_Developer entries fetched",$rows);
?>
