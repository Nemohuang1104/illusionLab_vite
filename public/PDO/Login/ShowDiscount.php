<?php
// ShowCoupon.php
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
            // 查詢會員資料
            $sql = "SELECT DISCOUNT_CODE, DISCOUNT_AMOUNT, COUPON_USED FROM MEMBER WHERE TOKEN = :token";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && $user['COUPON_USED'] == 1) {
                echo json_encode(["status" => "success", "data" => ["discount_code" => $user['DISCOUNT_CODE'],
                "discount_amount" => $user['DISCOUNT_AMOUNT']]]);
            } else {
                echo json_encode(["status" => "error", "message" => "無法自動填入優惠碼。"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "無效的輸入資料。"]);
    }
}
?>