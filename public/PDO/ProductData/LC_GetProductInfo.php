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
    // 取得商品 ID
    $productId = isset($_GET['productId']) ? intval($_GET['productId']) : 0;

    // 使用從 conn.php 中獲取的變數建立 PDO 物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 查詢商品基本資訊
    $sql = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = :productId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // 查詢商品的所有尺寸
        $sizeSql = "SELECT SIZE_VALUE FROM PRODUCT_SIZES WHERE PRODUCT_ID = :productId";
        $sizeStmt = $pdo->prepare($sizeSql);
        $sizeStmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $sizeStmt->execute();
        $sizes = $sizeStmt->fetchAll(PDO::FETCH_COLUMN);

        // 查詢商品的所有樣式
        $styleSql = "SELECT STYLE_VALUE FROM PRODUCT_STYLES WHERE PRODUCT_ID = :productId";
        $styleStmt = $pdo->prepare($styleSql);
        $styleStmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $styleStmt->execute();
        $styles = $styleStmt->fetchAll(PDO::FETCH_COLUMN);

        // 將尺寸和樣式加入商品資料中
        $product['PRODUCT_SIZES'] = $sizes;
        $product['PRODUCT_STYLES'] = $styles;

        // 返回商品資料
        echo json_encode($product);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
} catch (PDOException $e) {
    // 捕捉並返回錯誤
    echo json_encode(['error' => $e->getMessage()]);
}

?>
