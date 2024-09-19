<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../conn.php");  // 引入 conn.php 以獲取連接資訊

// CORS 設定
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

$sql = "SELECT * FROM EVENT";
$result = $conn->query($sql);

$events = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($events);

$conn->close();
?>
