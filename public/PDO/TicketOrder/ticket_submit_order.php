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


// 獲取 Authorization 標頭中的 Token
$headers = getallheaders();
$authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : (isset($headers['authorization']) ? $headers['authorization'] : '');
$token = str_replace('Bearer ', '', $authHeader);

$headers = apache_request_headers();
if (!isset($headers['Authorization'])) {
    echo json_encode(['success' => false, 'message' => '沒有提供 token'], JSON_UNESCAPED_UNICODE);
    exit;
}

// $authHeader = $headers['Authorization'];
// $token = str_replace('Bearer ', '', $authHeader); // 移除 'Bearer ' 前綴

// 根據 token 查詢對應的 USER_ID
$sql = "SELECT USER_ID FROM MEMBER WHERE TOKEN = :token";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':token', $token);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(['success' => false, 'message' => '無效的 token'], JSON_UNESCAPED_UNICODE);
    exit;
}

$userId = $user['USER_ID']; // 取得 USER_ID

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

// 插入訂單的 SQL 語句，並將 USER_ID 一併插入
$sql = "INSERT INTO ticket_order (USER_ID, NAME, COMPANY, TAX_ID, EVENT_ID, EVENT_NAME, DATE, TIME, QUANTITY, TOTAL_PRICE, ORDER_DATE, ORDER_STATUS, PAYMENT_DATE, PAYMENT_METHOD, NOTE) 
        VALUES (:userId, :name, :companyName, :taxID, :eventId, :eventName, :date, :time, :guestNumber, :total, NOW(), :orderStatus, NOW(), :paymentMethod, :comments)";

$stmt = $pdo->prepare($sql);

// 執行插入
if ($stmt->execute([
    ':userId' => $userId, // 插入 USER_ID
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
    ':comments' => $data['comments'] ?? '', // 默認為空
])) {
    // 獲取剛插入的 orderId
    $orderId = $pdo->lastInsertId();

    // 回傳訂單成功並帶上 orderId
    echo json_encode(['success' => true, 'message' => '訂單提交成功', 'orderId' => $orderId], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(['success' => false, 'message' => '訂單提交失敗'], JSON_UNESCAPED_UNICODE);
}
?>
