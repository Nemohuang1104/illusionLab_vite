<?php
include("../conn.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productOrderId = $_POST['TICKET_ORDER_ID'];
    $orderStatus = $_POST['ORDER_STATUS'];
  

    // 更新商品資訊
    try {
        // 建立 SQL 語句，根據是否有圖片決定是否更新 PRODUCT_IMG 欄位
        $sql = "UPDATE ticket_order SET ORDER_STATUS = :orderStatus";

        $sql .= " WHERE TICKET_ORDER_ID = :ticketOrderId";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':orderStatus', $orderStatus);
        $stmt->bindParam(':ticketOrderId', $productOrderId);
        


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
}
?>