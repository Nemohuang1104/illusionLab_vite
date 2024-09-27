<?php

// 設置 CORS 標頭
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

// 處理預檢請求（OPTIONS）
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include("../conn.php");  // 引入資料庫連接檔案

// 獲取 Authorization 標頭中的 Token
$headers = getallheaders();
$authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : (isset($headers['authorization']) ? $headers['authorization'] : '');
$token = str_replace('Bearer ', '', $authHeader);

// 判斷是否有 token
if ($token) {
    // 獲取 POST 數據
    $data = json_decode(file_get_contents('php://input'), true);
    $discountCode = isset($data['discountCode']) ? $data['discountCode'] : '';

    if ($discountCode) {
        try {
            // 查詢 Token 是否在資料庫中
            $sql = "SELECT USER_ID FROM MEMBER WHERE TOKEN = :token";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                echo json_encode(["status" => "error", "message" => "無效的 token"]);
                exit();
            }

            // 更新 TICKET_CODE_USED 為 1
            $updateSql = "UPDATE MEMBER SET TICKET_CODE_USED = 1, TICKET_DISCOUNT_CODE = :discountCode WHERE USER_ID = :userId";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(':discountCode', $discountCode);
            $updateStmt->bindParam(':userId', $user['USER_ID']);
            $updateStmt->execute();

            echo json_encode(["status" => "success", "message" => "折扣碼使用狀態已更新。"]);
        } catch (PDOException $e) {
            // 查詢錯誤處理
            echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "缺少折扣碼"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "未登入或 Token 無效"]);
}

?>
