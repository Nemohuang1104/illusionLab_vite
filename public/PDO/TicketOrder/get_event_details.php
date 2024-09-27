<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../conn.php'; // 確保 conn.php 的路徑正確

// CORS 設定
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

// 根據前端傳來的 EVENT_ID 查詢活動詳細資訊
$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0; // 確保 event_id 是整數
$sql = "SELECT EVENT_NAME, EVENT_PRICE FROM EVENT WHERE EVENT_ID = :event_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['event_id' => $event_id]);

// 抓取資料
$eventDetails = $stmt->fetch(PDO::FETCH_ASSOC);

if ($eventDetails) {
    // 返回 JSON 結果
    echo json_encode($eventDetails);
} else {
    // 如果找不到活動，返回錯誤信息
    echo json_encode(['error' => 'Event not found']);
}
?>
