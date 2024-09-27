<?php

// 設置 CORS 標頭
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
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

    // 撰寫 SQL 語句，根據 token 查找對應的會員
    $sql = "SELECT USER_NAME, EMAIL, PHONE_NUMBER, TICKET_DISCOUNT_CODE, TICKET_CODE_USED FROM MEMBER WHERE TOKEN = :token ";

    try {
        // 準備 SQL 語句
        $stmt = $pdo->prepare($sql);
        // 綁定參數
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        // 執行查詢
        $stmt->execute();

        // 獲取查詢結果
        $member = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($member) {
            if ($member['TICKET_CODE_USED'] == 1) {
                $member['TICKET_DISCOUNT_CODE'] = null;
            }
            // 以 JSON 格式回傳會員資料
            echo json_encode([
                'status' => 'success',
                'data' => $member
            ]);
        } else {

            echo json_encode([
                'status' => 'error',
                'message' => '會員資料不存在'
            ]);
        }
    } catch (PDOException $e) {
        // 查詢錯誤處理
        echo json_encode([
            'status' => 'error',
            'message' => '查詢失敗: ' . $e->getMessage()
        ]);
    }
} else {
  
    echo json_encode([
        'status' => 'error',
        'message' => '未登入或 Token 無效'
    ]);
}
?>
