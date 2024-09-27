
<?php

// login.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

header("Cache-Control: no-cache, must-revalidate"); // 禁止緩存

include("../conn.php");  // 引入您的資料庫連接檔案

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取並驗證輸入數據
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // 基本驗證
    if (empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "請填寫所有必填欄位。"]);
        exit;
    }

    try {
        // 查詢用戶，增加 ACCOUNT_STATUS 欄位
        $sql = "SELECT USER_ID, PASSWORD, ACCOUNT_STATUS FROM MEMBER WHERE EMAIL = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // 檢查是否找到用戶
        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => '電子郵件或密碼錯誤。']);
            exit();
        }

        // 檢查會員狀態
        if ($user['ACCOUNT_STATUS'] === '停權') {
            echo json_encode(['status' => 'error', 'message' => '您的帳號已被停權，無法登入']);
            exit();
        }

        // 驗證密碼
        if (password_verify($password, $user['PASSWORD'])) {
            // 密碼正確，生成 Token
            $token = bin2hex(random_bytes(16)); // 生成隨機 Token

            // 將 Token 存儲到資料庫
            $updateSql = "UPDATE MEMBER SET TOKEN = :token WHERE USER_ID = :userId";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(':token', $token);
            $updateStmt->bindParam(':userId', $user['USER_ID']);
            $updateStmt->execute();

            echo json_encode(["status" => "success", "token" => $token]);
        } else {
            echo json_encode(["status" => "error", "message" => "電子郵件或密碼錯誤。"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}
?>
