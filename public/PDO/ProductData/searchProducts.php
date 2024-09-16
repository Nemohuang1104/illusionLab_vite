<?php
// searchProducts.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

// 資料庫連接
include("../conn.php");


// 取得前端的搜尋關鍵字
$input = json_decode(file_get_contents('php://input'), true);
$searchQuery = $input['query'] ?? '';

// 構建 SQL 查詢語句
$sql = "SELECT * FROM PRODUCT WHERE PRODUCT_ID LIKE :query OR PRODUCT_NAME LIKE :query";
$stmt = $pdo->prepare($sql);
$stmt->execute(['query' => '%' . $searchQuery . '%']);

// 獲取篩選後的資料
$results = $stmt->fetchAll();

echo json_encode($results);
