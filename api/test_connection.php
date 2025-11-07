<?php
require_once("../config/db_connect.php");
require_once("../utils/response.php");

if ($conn) {
    sendResponse("success", "Database connection successful!");
} else {
    sendResponse("error", "Connection failed!");
}
?>
