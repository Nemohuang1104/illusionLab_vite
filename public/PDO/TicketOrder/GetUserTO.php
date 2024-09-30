<?php
// GetUserPO.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

include("../conn.php");  // 引入資料庫連接

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取前端傳來的 token
    $token = $_POST['token'] ?? '';

    // 如果 token 為空，返回錯誤信息
    if (empty($token)) {
        echo json_encode(["status" => "error", "message" => "缺少 token。"]);
        exit;
    }

    try {
        // 根據 token 查詢會員資料
        $stmt = $pdo->prepare("SELECT USER_ID FROM MEMBER WHERE TOKEN = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        
        // 獲取結果
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $userId = $user['USER_ID'];

            // 查詢會員的所有訂單
            $orderStmt = $pdo->prepare("
               SELECT TICKET_ORDER_ID, TICKET_ORDER_LIST,  DATE(ORDER_DATE) AS ORDER_DATE, TOTAL_PRICE, PAYMENT_METHOD, ORDER_STATUS
                FROM ticket_order 
                WHERE USER_ID = :userId 
                GROUP BY TICKET_ORDER_ID
            ");
            $orderStmt->bindParam(':userId', $userId);
            $orderStmt->execute();
            
            $orders = $orderStmt->fetchAll(PDO::FETCH_ASSOC);

            if ($orders) {
                // 返回訂單資料
                echo json_encode(["status" => "success", "data" => $orders]);
            } else {
                // 如果找不到訂單
                echo json_encode(["status" => "error", "message" => "找不到相關訂單。"]);
            }
        } else {
            // 如果找不到會員
            echo json_encode(["status" => "error", "message" => "找不到使用者。"]);
        }
    } catch (PDOException $e) {
        // 捕捉資料庫錯誤並返回
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}
?>