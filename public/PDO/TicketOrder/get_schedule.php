<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// include_once '../conn.php'; // 確保 conn.php 的路徑正確

// // CORS 設定
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type, Authorization");
// header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

// $event_id = $_GET['event_id'];
// $schedule_date = $_GET['date'];

// // 檢查 event_id 和 schedule_date 是否有提供
// if (!empty($event_id) && !empty($schedule_date)) {
//     // 查詢該活動在指定日期的所有時間
//     $sql = "SELECT SCHEDULE_TIME FROM SCHEDULE WHERE EVENT_ID = :event_id AND SCHEDULE_DATE = :schedule_date";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
//     $stmt->bindParam(':schedule_date', $schedule_date, PDO::PARAM_STR);
//     $stmt->execute();

//     $times = $stmt->fetchAll(PDO::FETCH_COLUMN);

//     // 返回JSON格式
//     echo json_encode($times);
// } else {
//     echo json_encode(["error" => "Invalid parameters"]);
// }

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../conn.php'; // 確保 conn.php 的路徑正確

// CORS 設定
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

// 接收 event_id 和 guests 數量
$event_id = $_GET['event_id'];
$guests = $_GET['guests'];
$date = $_GET['date']; // 如果你需要根據選擇的日期篩選

// 查詢可用的日期和時間，且 available_tickets 大於或等於所選人數
$sql = "SELECT SCHEDULE_DATE, SCHEDULE_TIME, AVAILABLE_TICKETS 
        FROM SCHEDULE 
        WHERE EVENT_ID = ? AND AVAILABLE_TICKETS >= ?";

if ($date) {
    $sql .= " AND SCHEDULE_DATE = ?";
}

$stmt = $pdo->prepare($sql);
$stmt->execute([$event_id, $guests, $date]);

$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($schedules);


?>
