<?php
// SetQuizCompleted.php

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

include("../conn.php");  // 引入您的資料庫連接檔案

// 獲取 Authorization 標頭中的 Token
$headers = getallheaders();
$authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : (isset($headers['authorization']) ? $headers['authorization'] : '');
$token = str_replace('Bearer ', '', $authHeader);

if ($token) {
    try {
        // 印出 token 值以進行檢查
        var_dump($token);

        // 查詢 Token 是否在資料庫中
        $sql = "SELECT USER_ID, QUIZ_COMPLETED FROM MEMBER WHERE TOKEN = :token";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            echo json_encode(["status" => "error", "message" => "無效的 token"]);
            exit();
        }

        // 更新 QUIZ_COMPLETED 為 1
        $updateQuizSql = "UPDATE MEMBER SET QUIZ_COMPLETED = 1 WHERE USER_ID = :userId";
        $updateQuizStmt = $pdo->prepare($updateQuizSql);
        $updateQuizStmt->bindParam(':userId', $user['USER_ID']);
        $updateQuizStmt->execute();

        echo json_encode(["status" => "success", "message" => "測驗完成標記已更新。"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "缺少 token"]);
}
?>
