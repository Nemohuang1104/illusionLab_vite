<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../conn.php'; // 引入資料庫連線

// CORS 設定
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

// 取得 POST 的訂單資料
$data = json_decode(file_get_contents("php://input"), true);

// 驗證接收到的資料
if (
    !isset($data['name']) || !isset($data['companyName']) || !isset($data['taxID']) || 
    !isset($data['eventId']) || !isset($data['eventName']) || !isset($data['date']) || 
    !isset($data['time']) || !isset($data['guestNumber']) || !isset($data['total']) || 
    !isset($data['paymentMethod']) || !isset($data['orderStatus'])
) {
    echo json_encode(['success' => false, 'message' => '缺少必要資料'], JSON_UNESCAPED_UNICODE);
    exit;
}

// 插入訂單的 SQL 語句
$sql = "INSERT INTO ticket_order (NAME, COMPANY, TAX_ID, EVENT_ID, EVENT_NAME, DATE, TIME, QUANTITY, TOTAL_PRICE, ORDER_DATE, ORDER_STATUS, PAYMENT_DATE, PAYMENT_METHOD, NOTE) 
        VALUES (:name, :companyName, :taxID, :eventId, :eventName, :date, :time, :guestNumber, :total, NOW(), :orderStatus, NOW(), :paymentMethod, :comments)";

$stmt = $pdo->prepare($sql);

// 執行插入
if ($stmt->execute([
    ':name' => $data['name'],
    ':companyName' => $data['companyName'],
    ':taxID' => $data['taxID'],
    ':eventId' => $data['eventId'],
    ':eventName' => $data['eventName'],
    ':date' => $data['date'],
    ':time' => $data['time'],
    ':guestNumber' => $data['guestNumber'],
    ':total' => $data['total'],
    ':orderStatus' => $data['orderStatus'],
    ':paymentMethod' => $data['paymentMethod'],
    ':comments' => $data['comments'] ?? '',
])) {
    // 獲取剛插入的 orderId
    $orderId = $pdo->lastInsertId();

    // 回傳訂單成功並帶上 orderId
    echo json_encode(['success' => true, 'message' => '訂單提交成功', 'orderId' => $orderId], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(['success' => false, 'message' => '訂單提交失敗'], JSON_UNESCAPED_UNICODE);
}





// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// include_once '../conn.php'; // 引入資料庫連線

// // CORS 設定
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type, Authorization");
// header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

// // 取得 POST 的訂單資料
// $data = json_decode(file_get_contents("php://input"), true);

// // 驗證接收到的資料
// if (
//     !isset($data['name']) || !isset($data['companyName']) || !isset($data['taxID']) || 
//     !isset($data['eventId']) || !isset($data['eventName']) || !isset($data['date']) || 
//     !isset($data['time']) || !isset($data['guestNumber']) || !isset($data['total']) || 
//     !isset($data['paymentMethod']) || !isset($data['orderStatus'])
// ) {
//     echo json_encode(['success' => false, 'message' => '缺少必要資料'],JSON_UNESCAPED_UNICODE);
//     exit;
// }

// // 插入訂單的 SQL 語句
// $sql = "INSERT INTO ticket_order (NAME, COMPANY, TAX_ID, EVENT_ID, EVENT_NAME, DATE, TIME, QUANTITY, TOTAL_PRICE, ORDER_DATE, ORDER_STATUS, PAYMENT_DATE, PAYMENT_METHOD, NOTE) 
//         VALUES (:name, :companyName, :taxID, :eventId, :eventName, :date, :time, :guestNumber, :total, NOW(), :orderStatus, NOW(), :paymentMethod, :comments)";

// $stmt = $pdo->prepare($sql);


// // 執行插入
// if ($stmt->execute([
//     ':name' => $data['name'],
//     ':companyName' => $data['companyName'],
//     ':taxID' => $data['taxID'],
//     ':eventId' => $data['eventId'],
//     ':eventName' => $data['eventName'],
//     ':date' => $data['date'],
//     ':time' => $data['time'],
//     ':guestNumber' => $data['guestNumber'],
//     ':total' => $data['total'],
//     ':orderStatus' => $data['orderStatus'],
//     ':paymentMethod' => $data['paymentMethod'],
//     ':comments' => $data['comments'] ?? '',
// ])) {
//     echo json_encode(['success' => true, 'message' => '訂單提交成功']);
// } else {
//     echo json_encode(['success' => false, 'message' => '訂單提交失敗']);
// }
?>
