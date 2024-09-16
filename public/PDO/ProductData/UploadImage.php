<?php
header('Content-Type: application/json');

$target_dir = "uploads/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$response = ['success' => false];

if ($_FILES['image']) {
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $response['success'] = true;
        $response['filePath'] = $target_file;
    } else {
        $response['message'] = "圖片上傳失敗";
    }
} else {
    $response['message'] = "未接收到圖片文件";
}

echo json_encode($response);
?>