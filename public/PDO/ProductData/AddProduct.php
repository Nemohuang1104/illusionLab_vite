<?php
include("../conn.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['EVENT_ID'];
    $productName = $_POST['PRODUCT_NAME'];
    $productPrice = $_POST['PRODUCT_PRICE'];
    $productStatus = $_POST['PRODUCT_STATUS'];
    $productMaterial = $_POST['MATERIAL'];
    $productSize = $_POST['PRODUCT_SIZE'];

    // 處理圖片上傳
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // 定義圖片存放目錄
        // $targetDir = $_SERVER["DOCUMENT_ROOT"] . "/public/PDO/FileUpload/";
        $targetDir = $_SERVER["DOCUMENT_ROOT"] . "/tid102/g2/public/PDO/FileUpload/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // 若目錄不存在，則建立目錄
        }

        // 產生唯一檔案名
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $fileName;

        // 移動上傳的圖片檔案
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            // 如果圖片上傳成功，將相對路徑保存到資料庫
            // $imagePath = "/public/PDO/FileUpload/" . $fileName;
            $imagePath = "/public/PDO/FileUpload/" . $fileName;
        } else {
            echo json_encode(["status" => "error", "message" => "圖片上傳失敗"]);
            exit;
        }
    }

    // 新增商品資訊
    try {
        // 建立 SQL 語句，根據是否有圖片決定是否插入 PRODUCT_IMG 欄位
        $sql = "INSERT INTO PRODUCT (EVENT_ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_STATUS, MATERIAL, PRODUCT_SIZE";

        if ($imagePath) {
            $sql .= ", PRODUCT_IMG"; // 若有圖片，插入 PRODUCT_IMG 欄位
        }

        $sql .= ") VALUES (:eventId, :productName, :productPrice, :productStatus, :productMaterial, :productSize";

        if ($imagePath) {
            $sql .= ", :imagePath"; // 若有圖片，插入相應的值
        }

        $sql .= ")";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productPrice', $productPrice);
        $stmt->bindParam(':productStatus', $productStatus);
        $stmt->bindParam(':productMaterial', $productMaterial);
        $stmt->bindParam(':productSize', $productSize);

        if ($imagePath) {
            $stmt->bindParam(':imagePath', $imagePath); // 綁定圖片路徑參數
        }

        // 執行 SQL 語句
        if ($stmt->execute()) {
            // 獲取剛剛插入的商品 ID
            $newProductId = $pdo->lastInsertId();
            echo json_encode(["status" => "success", "PRODUCT_ID" => $newProductId]);
        } else {
            echo json_encode(["status" => "error", "message" => "資料庫插入失敗"]);
        }
    } catch (PDOException $e) {
        // 捕獲並顯示資料庫錯誤訊息
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}
?>


