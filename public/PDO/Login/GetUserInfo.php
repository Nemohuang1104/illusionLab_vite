<?php
// GetUserInfo.php

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
        $stmt = $pdo->prepare("SELECT USER_ID, USER_NAME, GENDER, EMAIL, PHONE_NUMBER, ADDRESS, city, district FROM MEMBER WHERE TOKEN = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        
        // 獲取結果
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            // 拼接地址、區和城市成一個完整的地址字串
            $fullAddress = $user['city'] . ' ' . $user['district'] . ' ' . $user['ADDRESS'];
            // 返回會員資料
            echo json_encode([
                "status" => "success",
                "data" => [
                    "user_id" => $user['USER_ID'],
                    "user_name" => $user['USER_NAME'],
                    "gender" => $user['GENDER'],
                    "email" => $user['EMAIL'],
                    "phone_number" => $user['PHONE_NUMBER'],
                    "address" => $fullAddress,  // 返回完整地址
                ]
            ]);
        } else {
            // 如果找不到用戶，返回錯誤信息
            echo json_encode(["status" => "error", "message" => "找不到使用者。"]);
        }
    } catch (PDOException $e) {
        // 捕捉資料庫錯誤並返回
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}

?>