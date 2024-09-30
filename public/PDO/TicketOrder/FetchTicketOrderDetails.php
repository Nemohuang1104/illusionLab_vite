<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../conn.php");  // 引入 conn.php 以獲取連接資訊

// CORS 設定
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // 設置返回的內容類型為 JSON

if (isset($_GET['TICKET_ORDER_ID'])) {
  $ticketOrderId = $_GET['TICKET_ORDER_ID'];

  try {
      // 建立 PDO 連線
      $pdo = new PDO($dsn, $db_user, $db_pass);

      // SQL 查詢語法
      $sql = "SELECT * FROM ticket_order WHERE TICKET_ORDER_ID = :ticket_order_id";

      // 預備 SQL 查詢
      $stmt = $pdo->prepare($sql);

      // 綁定參數
      $stmt->bindParam(':ticket_order_id', $ticketOrderId, PDO::PARAM_INT);

      // 執行查詢
      $stmt->execute();

      // 取得結果
      $orderDetails = $stmt->fetch(PDO::FETCH_ASSOC);

      // 如果有資料，回傳 JSON 格式
      if ($orderDetails) {
          echo json_encode($orderDetails);
      } else {
          echo json_encode(['message' => '訂單不存在']);
      }
  } catch (PDOException $e) {
      // 錯誤處理
      echo json_encode(['error' => $e->getMessage()]);
  }
} else {
  echo json_encode(['error' => '缺少訂單編號']);
}

?>
