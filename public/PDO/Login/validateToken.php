<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

include("../conn.php");  // 引入資料庫連接

$headers = getallheaders();
$token = str_replace('Bearer ', '', $headers['Authorization']);  // 從 headers 中取出 token

if ($token) {
    try {
        // 查詢 token 是否在資料庫中
        $sql = "SELECT USER_ID FROM MEMBER WHERE TOKEN = :token";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // Token 有效
            echo json_encode(["status" => "success"]);
        } else {
            // Token 無效
            echo json_encode(["status" => "error", "message" => "無效的 token"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "缺少 token"]);
}

?>
