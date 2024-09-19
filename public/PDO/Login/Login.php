
<?php
// login.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

header('Content-Type: application/json');
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
        // 查詢用戶
        $sql = "SELECT USER_ID, PASSWORD FROM MEMBER WHERE EMAIL = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['PASSWORD'])) {
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