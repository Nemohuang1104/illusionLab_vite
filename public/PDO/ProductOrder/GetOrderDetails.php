<?php
// GetOrderDetails.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

include("../conn.php");  // 引入資料庫連接

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productOrderId = $_POST['PRODUCT_ORDER_ID'] ?? '';

    if (empty($productOrderId)) {
        echo json_encode(["status" => "error", "message" => "缺少訂單編號。"]);
        exit;
    }

    try {
        // 查詢訂單商品明細
        $stmt = $pdo->prepare("
            SELECT por.PRODUCT_ID, por.QUANTITY, por.PRICE_AT_PURCHASE, p.PRODUCT_NAME, p.PRODUCT_IMG 
            FROM PRODUCT_ORDER_RELATED por
            LEFT JOIN PRODUCT p ON por.PRODUCT_ID = p.PRODUCT_ID
            WHERE por.ORDER_ID = :productOrderId
        ");
        $stmt->bindParam(':productOrderId', $productOrderId);
        $stmt->execute();
        
        $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($orderDetails) {
            echo json_encode(["status" => "success", "data" => $orderDetails]);
        } else {
            echo json_encode(["status" => "error", "message" => "找不到相關商品明細。"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}
?>
