<?php
// ResetCoupon.php
include("../conn.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取前端傳來的 token
    $token = $_POST['token'] ?? '';

    if (!empty($token)) {
        try {
            // 更新 COUPON_USED 為 0
            $updateSql = "UPDATE MEMBER SET COUPON_USED = 0 WHERE TOKEN = :token";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(':token', $token);

            if ($updateStmt->execute()) {
                echo json_encode(["status" => "success", "message" => "優惠券已重置。"]);
            } else {
                echo json_encode(["status" => "error", "message" => "重置失敗。"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "無效的輸入資料。"]);
    }
}
?>