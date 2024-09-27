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

// 如果是 OPTIONS 請求，直接返回 200 OK
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}

// 檢查是否傳遞 PRODUCT_ORDER_ID
if (!isset($_GET['PRODUCT_ORDER_ID'])) {
    echo json_encode(['error' => 'PRODUCT_ORDER_ID parameter is missing.']);
    exit();
}

$productOrderId = $_GET['PRODUCT_ORDER_ID'];

try {
    // 使用從 conn.php 中獲取的變數建立 PDO 物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 根據 PRODUCT_ORDER_ID 查詢訂單詳細資訊
    // $sql = "SELECT po.*, por.* 
    //         FROM PRODUCT_ORDER_RELATED por 
    //         JOIN PRODUCT_ORDER po ON po.PRODUCT_ORDER_ID = por.ORDER_ID
    //         WHERE po.PRODUCT_ORDER_ID = :productOrderId";
    
    $sql = "
    SELECT *
    FROM 
        PRODUCT_ORDER po
    WHERE po.PRODUCT_ORDER_ID = :productOrderId";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':productOrderId', $productOrderId, PDO::PARAM_INT);
    $stmt->execute();
    
    // 獲取結果
    $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 如果沒有找到資料，返回錯誤
    if (!$orderDetails) {
        echo json_encode(['error' => 'No order details found for the provided ID.']);
        exit();
    }

    // 返回 JSON 格式的訂單詳細資訊
    echo json_encode($orderDetails);
} catch (PDOException $e) {
    // 捕捉並返回錯誤
    echo json_encode(['error' => $e->getMessage()]);
}

?>