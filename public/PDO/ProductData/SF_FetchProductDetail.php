<?php
// // SF_FetchProductDetail.php
// header('Content-Type: application/json');

// // 資料庫連接
// $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// // 獲取商品 ID
// $product_id = $_GET['id'];

// // 查詢商品細項
// $query = $pdo->prepare('SELECT * FROM products WHERE id = :id');
// $query->execute(['id' => $product_id]);

// // 回傳 JSON 格式資料
// $product = $query->fetch(PDO::FETCH_ASSOC);
// echo json_encode($product);




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
    

     // 取得 productId 參數，並檢查是否存在
    $productId = isset($_GET['productId']) ? intval($_GET['productId']) : 0;
    // 從資料庫撈取商品資料
    $sql = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = :productId AND EVENT_ID = 2";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    
    // 返回 JSON 格式的商品數據
    $products = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($products);
} catch (PDOException $e) {
    // 捕捉並返回錯誤
    echo json_encode(['error' => $e->getMessage()]);
}

?>