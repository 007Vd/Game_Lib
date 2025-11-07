<?php
require_once("../../config/db_connect.php");
require_once("../../utils/response.php");

$sql = "SELECT * FROM Genres";
$result = $conn->query($sql);
$rows = [];
while ($r = $result->fetch_assoc()) $rows[] = $r;
sendResponse("success", "Genres fetched", $rows);
?>
