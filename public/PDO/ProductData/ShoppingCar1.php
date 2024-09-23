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

// 如果是 OPTIONS 請求，直接返回 200 OK
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}

try {
    // 使用從 conn.php 中獲取的變數建立 PDO 物件
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select.";charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 取得 相關 參數
    $userId = isset($_GET['userId']) ? $_GET['userId'] : 0;

    // 根據請求方法來執行不同操作
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // POST 請求：新增商品到購物車
        $productId = isset($_POST['productId']) ? intval($_POST['productId']) : 0;
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
       
        $sql = "INSERT INTO cart (USER_ID, PRODUCT_ID, QUANTITY, CREATED_AT)
                VALUES (:userId, :productId, :quantity, sysdate())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(['message' => '商品已成功加入購物車']);

    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // GET 請求：查詢購物車商品的詳細信息
        $sql = "
            SELECT 
                cart.PRODUCT_ID, 
                product.PRODUCT_NAME, 
                product.PRODUCT_PRICE, 
                product.PRODUCT_IMG, 
                CAST(SUM(cart.QUANTITY) AS UNSIGNED) AS QUANTITY, 
                CAST((product.PRODUCT_PRICE * SUM(cart.QUANTITY)) AS UNSIGNED) AS total_price
            FROM 
                cart
            JOIN 
                product 
            ON 
                cart.PRODUCT_ID = product.PRODUCT_ID
            WHERE 
                cart.USER_ID = :userId
            GROUP BY 
                cart.PRODUCT_ID, 
                product.PRODUCT_NAME, 
                product.PRODUCT_PRICE, 
                product.PRODUCT_IMG
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 轉換數量和總價格為整數
        foreach ($products as &$product) {
            $product['QUANTITY'] = (int)$product['QUANTITY'];
            $product['total_price'] = (int)$product['total_price'];
        }

        echo json_encode($products);

    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }

} catch (PDOException $e) {
    // 捕捉並返回錯誤
    echo json_encode(['error' => $e->getMessage()]);
}
?>