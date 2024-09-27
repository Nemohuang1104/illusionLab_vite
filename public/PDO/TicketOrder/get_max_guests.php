
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

// 取得事件ID
$eventId = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

if ($eventId > 0) {
    try {
        // 準備 SQL 查詢
        $query = "SELECT TICKET_SET FROM EVENT WHERE EVENT_ID = :event_id";
        $stmt = $pdo->prepare($query);
        // 綁定參數
        $stmt->bindParam(':event_id', $eventId, PDO::PARAM_INT);
        // 執行查詢
        $stmt->execute();
        // 獲取結果
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode(['maxGuests' => $result['TICKET_SET']]);
        } else {
            echo json_encode(['maxGuests' => 0]);
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid event ID";
}
?>
