<?php
// register.php

include("../conn.php");  // 引入您的資料庫連接檔案

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取並驗證輸入數據
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

        // 插入新用戶
        $sql = "INSERT INTO MEMBER (USER_NAME, EMAIL, PASSWORD, GENDER, PHONE_NUMBER, ADDRESS, city, district, ACCOUNT_STATUS, DISCOUNT_CODE, COUPON_USED) 
                VALUES (:username, :email, :password, :gender, :phoneNumber, :address, :city, :district, 'active', 0, 0)";
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
            echo json_encode(["status" => "success", "message" => "註冊成功。"]);
        } else {
            echo json_encode(["status" => "error", "message" => "註冊失敗，請稍後再試。"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}
?>