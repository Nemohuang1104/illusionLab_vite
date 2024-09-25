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

// 根據前端傳來的 EVENT_ID 查詢活動價格和活動名稱
$event_id = $_GET['event_id']; // 假設前端通過 GET 方式傳遞 event_id

$sql = "SELECT EVENT_PRICE, EVENT_NAME FROM EVENT WHERE EVENT_ID = :event_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['event_id' => $event_id]);

// 用 fetch 來獲取一行的所有欄位
$eventData = $stmt->fetch(PDO::FETCH_ASSOC);

// 檢查是否有查到資料
if ($eventData) {
    $price = $eventData['EVENT_PRICE'];
    $eventName = $eventData['EVENT_NAME'];
    // 返回 JSON 結果，加入 JSON_UNESCAPED_UNICODE 避免中文被編碼
    echo json_encode([
        'price' => $price,
        'eventName' => $eventName
    ], JSON_UNESCAPED_UNICODE);
} else {
    // 如果沒有找到對應的 EVENT_ID，返回錯誤信息
    echo json_encode([
        'error' => 'Event not found'
    ]);
}
?>
