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

try {
    // 使用從 conn.php 中獲取的變數建立 PDO 物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 根據請求方法來執行不同操作
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // 注意添加了花括号
        $productId = isset($_POST['productId']) ? intval($_POST['productId']) : 0;
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
        $userId = isset($_GET['userId']) ? $_GET['userId'] : 0;  // 假設 userId 是整數，如果是字符串，請使用 PDO::PARAM_STR

        $sql = "INSERT INTO cart (USER_ID, PRODUCT_ID, QUANTITY, CREATED_AT)
                VALUES (:userId, :productId, :quantity, NOW())"; // 使用 NOW() 替代 sysdate()
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT); // 如果 userId 是字符串，改為 PDO::PARAM_STR
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(['message' => '商品已成功加入購物車']);
    }
} catch (PDOException $e) {
    // 捕捉錯誤並回應
    echo json_encode(['error' => $e->getMessage()]);
}




?>



