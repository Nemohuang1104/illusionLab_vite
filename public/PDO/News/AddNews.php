<?php
include("../conn.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 檢查 PUBLISH_DATE，如果沒有傳入，則自動設置為當前日期
    
    $publishDate = date('Y-m-d'); // 使用當前日期
    $newsTittle = $_POST['NEWS_TITLE'];
    $newsContent = $_POST['NEWS_CONTENT'];
    $status = $_POST['STATUS'];
    $updateDate = date('Y-m-d'); // 使用當前日期

    // 處理圖片上傳
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // 定義圖片存放目錄
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
            $imagePath = "/public/PDO/FileUpload/" . $fileName;
        } else {
            echo json_encode(["status" => "error", "message" => "圖片上傳失敗"]);
            exit;
        }
    }

    // 新增新聞資訊
    try {
        // 建立 SQL 語句，根據是否有圖片決定是否插入 NEWS_IMG 欄位
        $sql = "INSERT INTO NEWS (PUBLISH_DATE, NEWS_TITLE, NEWS_CONTENT, STATUS, UPDATE_DATE";

        if ($imagePath) {
            $sql .= ", NEWS_IMG"; // 若有圖片，插入 NEWS_IMG 欄位
        }

        $sql .= ") VALUES (:publishDate, :newsTittle, :newsContent, :status, :updateDate";

        if ($imagePath) {
            $sql .= ", :imagePath"; // 若有圖片，插入相應的值
        }

        $sql .= ")";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':publishDate', $publishDate);
        $stmt->bindParam(':newsTittle', $newsTittle);
        $stmt->bindParam(':newsContent', $newsContent);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':updateDate', $updateDate);

        if ($imagePath) {
            $stmt->bindParam(':imagePath', $imagePath); // 綁定圖片路徑參數
        }

        // 執行 SQL 語句
        if ($stmt->execute()) {
            // 獲取剛剛插入的消息 ID
            $newNewsId = $pdo->lastInsertId();
            echo json_encode(["status" => "success", "NEWS_ID" => $newNewsId]);
        } else {
            echo json_encode(["status" => "error", "message" => "資料庫插入失敗"]);
        }
    } catch (PDOException $e) {
        // 捕獲並顯示資料庫錯誤訊息
        echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
    }
}
?>
