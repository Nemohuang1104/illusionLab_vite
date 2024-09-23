<?php
include("../conn.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 解析 JSON 資料
    $data = json_decode(file_get_contents('php://input'), true);

    $token = $data['token'] ?? '';
    $oldPassword = $data['oldPassword'] ?? '';
    $newPassword = $data['newPassword'] ?? '';
    $confirmPassword = $data['confirmPassword'] ?? '';

    // 基本驗證
    if (empty($token) || empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        echo json_encode(["status" => "error", "message" => "請填寫所有欄位。"]);
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        echo json_encode(["status" => "error", "message" => "新密碼與確認密碼不一致。"]);
        exit;
    }

    try {
        // 查詢會員資料（根據 token 獲取用戶信息）
        $stmt = $pdo->prepare("SELECT USER_ID, PASSWORD FROM MEMBER WHERE TOKEN = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // 驗證舊密碼
            if (password_verify($oldPassword, $user['PASSWORD'])) {
                // 加密新密碼
                $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

                // 更新密碼到資料庫
                $updateStmt = $pdo->prepare("UPDATE MEMBER SET PASSWORD = :newPassword WHERE USER_ID = :userId");
                $updateStmt->bindParam(':newPassword', $hashedNewPassword);
                $updateStmt->bindParam(':userId', $user['USER_ID']);

                if ($updateStmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "密碼修改成功。"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "更新密碼失敗。"]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "舊密碼錯誤。"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "找不到會員。"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}
?>

