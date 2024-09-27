<?php
include("../conn.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$response = ['success' => false];  // 初始化回應數組

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取請求中的數據
    $data = json_decode(file_get_contents('php://input'), true);
    
    $token = $data['token'];
    $products = $data['products'];
    $orderDate = $data['orderDate'];
    $paymentDate = $data['paymentDate'];
    $formData = $data['formData'];
    $shippingMethod = $data['shippingMethod'];  // 新增從前端獲取的運送方式

    // 驗證 token，查找對應的 userId
    $stmt = $pdo->prepare("SELECT USER_ID FROM MEMBER WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // 如果找不到用戶，回傳錯誤訊息
        $response['message'] = 'Invalid token';
        echo json_encode($response);
        exit;
    }

    $userId = $user['USER_ID'];  // 獲取用戶 ID

    // 計算訂單總價
    $totalPrice = 0;
    foreach ($products as $product) {
        $totalPrice += $product['QUANTITY'] * $product['PRICE_AT_PURCHASE'];
    }

    // 查詢會員是否有可用優惠券
    $stmt = $pdo->prepare("SELECT DISCOUNT_CODE, DISCOUNT_AMOUNT, COUPON_USED FROM MEMBER WHERE USER_ID = ?");
    $stmt->execute([$userId]);
    $member = $stmt->fetch(PDO::FETCH_ASSOC);

    // 檢查 COUPON_USED 狀態
    if (!$member || $member['COUPON_USED'] == 1) {
        // 如果沒有可用優惠券或優惠券已使用，記錄相關訊息但不終止執行
        $response['success'] = true;
        $response['message'] = '優惠券不可用或已使用，將不會影響訂單建立';

        // 將 $member 重新賦值
        $member = [
            'DISCOUNT_CODE' => null,
            'DISCOUNT_AMOUNT' => 0,
            'COUPON_USED' => 1 // 確保 COUPON_USED 設為 1
        ];

        // 同步更新 MEMBER 表中的 DISCOUNT_AMOUNT 欄位為 0
        $stmt = $pdo->prepare("UPDATE MEMBER SET DISCOUNT_AMOUNT = 0 WHERE USER_ID = ?");
        $stmt->execute([$userId]);
    }

    // 檢查是否有優惠券
    $discountAmount = 0;
    $discountCode = null;
    if (!empty($member['DISCOUNT_CODE'])) {
        $discountCode = $member['DISCOUNT_CODE'];
        $discountAmount = $member['DISCOUNT_AMOUNT'];
    }

    // 初始化運費變數
    $shipmentFee = 0;  // 預設運費為0

    // 根據運送方式來決定運送資料
    if ($shippingMethod === "宅配到府") {
        $shipmentStatus = "shipped";  // 如果是宅配到府，設定為已運送
        $shipment = "宅配";
        $shipmentFee = 100;

        $acceptorData = $data['acceptorData'] ?? null; // 使用前端傳來的acceptorData
        $orderData = null; 
    } else if ($shippingMethod === "7-11取貨") {
        $shipmentFee = 60;
        $shipment = "7-11取貨";
        $orderData = $data['orderData'] ?? null; // 使用前端傳來的orderData
        $acceptorData = null;
    } else {
        // 其他運送方式處理
        $shipmentStatus = "pending";
        $shipmentFee = 0;
        $shipment = "現場取貨";
        $acceptorData = null;  // 例如自取時不需要acceptorData
        $orderData = null; 
    }

    // 計算應付總價
    $finalTotalPrice = max($totalPrice - $discountAmount + $shipmentFee, 0);  // 保證不低於 0

    // 插入訂單資訊到 PRODUCT_ORDER 表
    $stmt = $pdo->prepare("
        INSERT INTO PRODUCT_ORDER (USER_ID, ORDER_DATE, PRODUCT_QUANTITY, TOTAL_PRICE, DISCOUNT_CODE, DISCOUNT_AMOUNT, SHIPMENT_STATUS, SHIPMENT,  ORDER_STATUS, PAYMENT_METHOD, PAYMENT_DATE, PRE_TOTAL_PRICE, SHIPMENT_FEE, STORE_NAME, STORE_ADDRESS, ACCEPTOR_NAME, ACCEPTOR_PHONE_NUMBER, ACCEPTOR_ADDRESS, BUYER_NAME, BUYER_PHONE_NUMBER, BUYER_ADDRESS) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $userId, $orderDate, count($products), $finalTotalPrice, $discountCode, 
        $discountAmount, 'pending', $shipment, '已完成', '信用卡', $paymentDate, 
        $totalPrice, $shipmentFee, 
        $orderData['store'] ?? null, $orderData['address'] ?? null, 
        $acceptorData['name'] ?? null, $acceptorData['phone'] ?? null, $acceptorData['address'] ?? null, $formData['user_name'] ?? null, $formData['phone_number'] ?? null, $formData['address'] ?? null
    ]);

    // 獲取插入的訂單ID
    $orderId = $pdo->lastInsertId();

    // 將購物車中的每個商品插入到 PRODUCT_ORDER_RELATED 表
    foreach ($products as $product) {
        $productId = $product['PRODUCT_ID'];
        $quantity = $product['QUANTITY'];
        $priceAtPurchase = $product['PRICE_AT_PURCHASE'];
        $status = 'pending';  // 預設狀態

        // 插入產品資訊到 PRODUCT_ORDER_RELATED 表
        $stmt = $pdo->prepare("
            INSERT INTO PRODUCT_ORDER_RELATED (ORDER_ID, PRODUCT_ID, QUANTITY, PRICE_AT_PURCHASE, STATUS) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$orderId, $productId, $quantity, $priceAtPurchase, $status]);
    }

    // 更新優惠券的使用狀態 (COUPON_USED = 1) 只在 COUPON_USED = 0 時才更新
    if (!empty($discountCode) && $member['COUPON_USED'] == 0) {
        $stmt = $pdo->prepare("UPDATE MEMBER SET COUPON_USED = 1 WHERE USER_ID = ? AND DISCOUNT_CODE = ?");
        $stmt->execute([$userId, $discountCode]);
    }

    // 回應成功訊息
    $response['success'] = true;
    $response['orderId'] = $orderId;
}

// 最後回傳 JSON 格式的回應
echo json_encode($response);
?>
