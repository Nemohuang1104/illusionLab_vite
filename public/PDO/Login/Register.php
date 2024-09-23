<?php
// register.php

include("../conn.php");  // 引入您的資料庫連接檔案

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

// 函數：生成6位隨機優惠碼（3位字母 + 3位數字）
function generateDiscountCode($pdo) {
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
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
        $stmt = $pdo->prepare("SELECT USER_ID FROM MEMBER WHERE DISCOUNT_CODE = :code");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $isUnique = true; // 如果優惠碼不存在，則為唯一
        }
    }

    return $code;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 從標準 POST 形式中獲取資料
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $repassword = $_POST['repassword'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $district = $_POST['district'] ?? '';

    // 基本驗證
    if (empty($username) || empty($email) || empty($password) || empty($repassword) || empty($city) || empty($district)) {
        echo json_encode(["status" => "error", "message" => "請填寫所有必填欄位。"]);
        exit;
    }

    if ($password !== $repassword) {
        echo json_encode(["status" => "error", "message" => "兩次輸入的密碼不一致。"]);
        exit;
    }

    // 密碼加密
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        // 檢查是否已存在相同的 email
        $checkSql = "SELECT USER_ID FROM MEMBER WHERE EMAIL = :email";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo json_encode(["status" => "error", "message" => "該電子郵件已被註冊。"]);
            exit;
        }

        // 開始事務處理
        $pdo->beginTransaction();

        // 插入新用戶，初始時設置 DISCOUNT_CODE 為 NULL
        $sql = "INSERT INTO MEMBER (USER_NAME, EMAIL, PASSWORD, GENDER, PHONE_NUMBER, ADDRESS, city, district, ACCOUNT_STATUS, DISCOUNT_CODE, COUPON_USED) 
                VALUES (:username, :email, :password, :gender, :phoneNumber, :address, :city, :district, '正常', NULL, 0)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':district', $district);

        if ($stmt->execute()) {
            // 取得最後插入的 USER_ID
            $userId = $pdo->lastInsertId();

            // 生成 USER_CODE
            $userCode = 'ILC' . str_pad($userId, 4, '0', STR_PAD_LEFT);

            // 生成唯一的 DISCOUNT_CODE
            $discountCode = generateDiscountCode($pdo);

            // 更新 USER_CODE 和 DISCOUNT_CODE
            $updateSql = "UPDATE MEMBER SET USER_CODE = :user_code, DISCOUNT_CODE = :discount_code WHERE USER_ID = :user_id";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(':user_code', $userCode);
            $updateStmt->bindParam(':discount_code', $discountCode);
            $updateStmt->bindParam(':user_id', $userId);

            if ($updateStmt->execute()) {
                // 提交事務
                $pdo->commit();

                echo json_encode([
                    "status" => "success",
                    "message" => "註冊成功。",
                    "user_code" => $userCode,
                    "discount_code" => $discountCode
                ]);
            } else {
                // 回滾事務
                $pdo->rollBack();
                echo json_encode(["status" => "error", "message" => "註冊失敗，請稍後再試。"]);
            }
        } else {
            // 回滾事務
            $pdo->rollBack();
            echo json_encode(["status" => "error", "message" => "註冊失敗，請稍後再試。"]);
        }
    } catch (PDOException $e) {
        // 回滾事務
        $pdo->rollBack();
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}
?>
