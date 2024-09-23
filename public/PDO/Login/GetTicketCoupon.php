<?php
// GetTicketCoupon.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

include("../conn.php");  // 引入您的資料庫連接檔案

// 函數：生成6位隨機優惠碼（3位字母 + 3位數字）
function generateDiscountCode($pdo) {
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';
    $code = '';
    $isUnique = false;

    while (!$isUnique) {
        // 生成3位隨機字母
        $code = '';
        for ($i = 0; $i < 3; $i++) {
            $code .= $letters[rand(0, strlen($letters) - 1)];
        }
        // 生成3位隨機數字
        for ($i = 0; $i < 3; $i++) {
            $code .= $digits[rand(0, strlen($digits) - 1)];
        }

        // 檢查優惠碼是否唯一
        $stmt = $pdo->prepare("SELECT USER_ID FROM MEMBER WHERE TICKET_DISCOUNT_CODE = :tcode");
        $stmt->bindParam(':tcode', $code);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $isUnique = true; // 如果優惠碼不存在，則為唯一
        }
    }

    return strtoupper($code);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 從 headers 中獲取 token
    $headers = getallheaders();
    $authHeader = $headers['Authorization'] ?? '';
    $token = str_replace('Bearer ', '', $authHeader);

    if ($token) {
        try {
            // 查詢 token 是否在資料庫中
            $sql = "SELECT USER_ID, TICKET_DISCOUNT_CODE, QUIZ_COMPLETED FROM MEMBER WHERE TOKEN = :token";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                echo json_encode(["status" => "error", "message" => "無效的 token"]);
                exit();
            }

            // 檢查是否已經完成測驗
            if (!$user['QUIZ_COMPLETED']) {
                echo json_encode(["status" => "error", "message" => "請先完成小測驗。"]);
                exit();
            }

            // 檢查是否已經領取優惠券
            if ($user['TICKET_DISCOUNT_CODE']) {
                echo json_encode(["status" => "error", "message" => "您已領取過優惠券。"]);
                exit();
            }

            // 生成 6 位隨機折扣碼
            $discountCode = generateDiscountCode($pdo);

            // 更新優惠碼和使用狀態，同時重置 QUIZ_COMPLETED
            $updateCouponSql = "UPDATE MEMBER SET TICKET_DISCOUNT_CODE = :discountCode WHERE USER_ID = :userId";
            $updateCouponStmt = $pdo->prepare($updateCouponSql);
            $updateCouponStmt->bindParam(':discountCode', $discountCode);
            $updateCouponStmt->bindParam(':userId', $user['USER_ID']);
            $updateCouponStmt->execute();

            echo json_encode(["status" => "success", "discountCode" => $discountCode]);
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "缺少 token"]);
    }
}
?>
