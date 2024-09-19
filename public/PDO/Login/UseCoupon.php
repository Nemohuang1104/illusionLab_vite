<?php
// UseCoupon.php

include("../conn.php");  // 引入您的資料庫連接檔案

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $userId = isset($data['userId']) ? intval($data['userId']) : 0;
    $discountCode = isset($data['discountCode']) ? trim($data['discountCode']) : '';

    if ($userId > 0 && !empty($discountCode)) {
        try {
            // 檢查優惠碼是否匹配且尚未被使用
            $sql = "SELECT COUPON_USED FROM MEMBER WHERE USER_ID = :userId AND DISCOUNT_CODE = :discountCode";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':discountCode', $discountCode, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if ($user['COUPON_USED'] == 0) {
                    // 更新 COUPON_USED 為 1
                    $updateSql = "UPDATE MEMBER SET COUPON_USED = 1 WHERE USER_ID = :userId AND DISCOUNT_CODE = :discountCode";
                    $updateStmt = $pdo->prepare($updateSql);
                    $updateStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                    $updateStmt->bindParam(':discountCode', $discountCode, PDO::PARAM_STR);

                    if ($updateStmt->execute()) {
                        echo json_encode(["status" => "success", "message" => "優惠碼使用成功。"]);
                    } else {
                        echo json_encode(["status" => "error", "message" => "優惠碼使用失敗，請稍後再試。"]);
                    }
                } else {
                    echo json_encode(["status" => "error", "message" => "優惠碼已被使用。"]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "優惠碼無效。"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "無效的輸入資料。"]);
    }
}
?>