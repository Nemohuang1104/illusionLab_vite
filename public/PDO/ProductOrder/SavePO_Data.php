<?php
include("../conn.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productOrderId = $_POST['PRODUCT_ORDER_ID'];
    $orderStatus = $_POST['ORDER_STATUS'];
    


    // 處理圖片上傳
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // 定義圖片存放目錄
        $targetDir = $_SERVER["DOCUMENT_ROOT"] . "/public/PDO/FileUpload/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // 若目錄不存在，則建立目錄
        }

        // 產生唯一檔案名
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $fileName;

        // 移動上傳的圖片檔案
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            // 如果圖片上傳成功，將相對路徑保存到資料庫
            $imagePath = "/public/PDO/FileUpload/" . $fileName;
        } else {
            echo json_encode(["status" => "error", "message" => "圖片上傳失敗"]);
            exit;
        }
    }

    // 更新商品資訊
    try {
        // 建立 SQL 語句，根據是否有圖片決定是否更新 PRODUCT_IMG 欄位
        $sql = "UPDATE PRODUCT_ORDER SET ORDER_STATUS = :orderStatus";

        if ($imagePath) {
            $sql .= ", PRODUCT_IMG = :imagePath"; // 若有圖片，更新 PRODUCT_IMG 欄位
        }

        $sql .= " WHERE PRODUCT_ORDER_ID = :productOrderId";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':orderStatus', $orderStatus);
        $stmt->bindParam(':productOrderId', $productOrderId);
        

        if ($imagePath) {
            $stmt->bindParam(':imagePath', $imagePath); // 綁定圖片路徑參數
        }

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
