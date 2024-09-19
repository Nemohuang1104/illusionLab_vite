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

$userId = $_POST['USER_ID'];
$company = $_POST['COMPANY'];
$eventId = $_POST['EVENT_ID'];
$quantity = $_POST['QUANTITY'];
$totalPrice = $_POST['TOTAL_PRICE'];
$scheduleDate = $_POST['SCHEDULE_DATE'];
$scheduleTime = $_POST['SCHEDULE_TIME'];

// 插入資料到 ticket_order 表
$sql = "INSERT INTO ticket_order (USER_ID, COMPANY, EVENT_ID, QUANTITY, TOTAL_PRICE, ORDER_STATUS)
        VALUES ('$userId', '$company', '$eventId', '$quantity', '$totalPrice', 'Pending')";

if ($conn->query($sql) === TRUE) {
    // 獲取最新插入的訂單ID
    $ticketOrderId = $conn->insert_id;

    // 插入資料到 SCHEDULE 表
    $scheduleSql = "INSERT INTO SCHEDULE (EVENT_ID, SCHEDULE_DATE, SCHEDULE_TIME, AVAILABLE_TICKETS)
                    VALUES ('$eventId', '$scheduleDate', '$scheduleTime', '30')"; // 假設每場最多30張票

    if ($conn->query($scheduleSql) === TRUE) {
        echo json_encode(["message" => "Order placed successfully"]);
    } else {
        echo json_encode(["error" => "Error inserting into SCHEDULE: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Error inserting into ticket_order: " . $conn->error]);
}

$conn->close();
?>
