<?php
include("../conn.php");  // 引入PDO連線檔案

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // 圖片存儲的目標目錄
        $targetDir = $_SERVER["DOCUMENT_ROOT"]."/PDO/FileUpload/";
        // 確保目錄存在
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // 設置圖片的目標路徑
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $fileName;

        // 保存圖片到伺服器
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            // 將路徑存入資料庫
            $imagePath = $targetFilePath;

            try {
                // 使用PDO準備SQL語句
                // SQL 語句已經改成將圖片路徑存入資料表 TID102_G2.TICKET_ORDER 中的 TICKET_IMAGE_PATH 欄位。
                $stmt = $pdo->prepare("INSERT INTO TID102_G2.TICKET_ORDER (TICKET_IMAGE_PATH) VALUES (:imagePath)");

                // 綁定參數
                $stmt->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);

                // 執行SQL
                if ($stmt->execute()) {
                    echo json_encode(["status" => "success", "path" => $imagePath]);
                } else {
                    echo json_encode(["status" => "error", "message" => "資料庫儲存失敗"]);
                }
            } catch (PDOException $e) {
                echo json_encode(["status" => "error", "message" => "資料庫錯誤：" . $e->getMessage()]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "圖片上傳失敗"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "無效的圖片文件"]);
    }
}
?>