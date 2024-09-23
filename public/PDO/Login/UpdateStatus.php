<?php
include("../conn.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 從 php://input 取得 JSON 格式的資料
    $data = json_decode(file_get_contents('php://input'), true);

    $userId = $data['userId'];
    $accountStatus = $data['accountStatus'];

    // 檢查 userId 和 accountStatus 是否有效
    if (isset($userId) && isset($accountStatus)) {
        try {
            // 建立 SQL 語句，更新 ACCOUNT_STATUS 欄位
            $sql = "UPDATE MEMBER SET ACCOUNT_STATUS = :accountStatus WHERE USER_ID = :userId";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':accountStatus', $accountStatus);

            // 執行 SQL 語句
            if ($stmt->execute()) {
                echo json_encode(["status" => "success"]);
            } else {
                echo json_encode(["status" => "error", "message" => "資料庫更新失敗"]);
            }
        } catch (PDOException $e) {
            // 捕獲並顯示資料庫錯誤訊息
            echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "無效的輸入資料"]);
    }
}
?>
