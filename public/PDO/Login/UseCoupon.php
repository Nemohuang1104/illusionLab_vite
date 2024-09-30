<?php
// UseCoupon.php
include("../conn.php");  // 引入資料庫連接

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取前端傳來的 token
    $token = $_POST['token'] ?? '';

    if (!empty($token)) {
        try {
            // 查找用戶的 TOKEN 和檢查優惠券狀態
            $sql = "SELECT COUPON_USED FROM MEMBER WHERE TOKEN = :token";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if ($user['COUPON_USED'] == 0) {
                    // 更新 COUPON_USED 為 1，表示優惠券已使用
                    $updateSql = "UPDATE MEMBER SET COUPON_USED = 0 WHERE TOKEN = :token";
                    $updateStmt = $pdo->prepare($updateSql);
                    $updateStmt->bindParam(':token', $token);
                    if ($updateStmt->execute()) {
                        echo json_encode(["status" => "success", "message" => "優惠券已使用。"]);
                    } else {
                        echo json_encode(["status" => "error", "message" => "優惠券使用失敗。"]);
                    }
                } else {
                    // 優惠券已經被使用，但結帳仍然允許進行
                    echo json_encode(["status" => "no_coupon", "message" => "優惠券已經被使用，但仍可結帳。"]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "用戶不存在或無效的 token。"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "無效的輸入資料。"]);
    }
}
?>