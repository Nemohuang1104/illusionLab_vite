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

// 獲取請求中的 event_id
$event_id = $_GET['event_id'];

// 檢查 event_id 是否提供
if (!empty($event_id)) {
    // 查詢該活動的所有日期
    $sql = "SELECT DISTINCT SCHEDULE_DATE FROM SCHEDULE WHERE EVENT_ID = :event_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
    $stmt->execute();

    $dates = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // 返回JSON格式
    echo json_encode($dates);
} else {
    echo json_encode(["error" => "Invalid parameters"]);
}

?>
