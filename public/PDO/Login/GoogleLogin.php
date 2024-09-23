<?php
// googleLogin.php
include("../conn.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json'); // 設置返回的內容類型為 JSON
header('Cross-Origin-Opener-Policy: same-origin'); 
header("Cache-Control: no-cache, must-revalidate"); // 禁止緩存
// 獲取前端傳來的資料
$postData = file_get_contents("php://input");
$request = json_decode($postData, true);
$mem_account = $request['mem_account'];
$mem_name = $request['mem_name'];

// 假設您有一個資料庫來儲存會員資料
// 使用 PDO 連接到資料庫 (此處假設已設置資料庫)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=YOUR_DB_NAME", "USERNAME", "PASSWORD");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 查詢資料庫是否已有此使用者
    $stmt = $pdo->prepare("SELECT * FROM members WHERE email = ?");
    $stmt->execute([$mem_account]);
    $user = $stmt->fetch();

    if ($user) {
        // 使用者已存在，返回使用者資料
        $response = [
            "memInfo" => [
                "mem_state" => 1,  // 登入成功
                "mem_name" => $user['name']
            ]
        ];
    } else {
        // 使用者不存在，新增使用者
        $stmt = $pdo->prepare("INSERT INTO members (email, name) VALUES (?, ?)");
        $stmt->execute([$mem_account, $mem_name]);

        $response = [
            "memInfo" => [
                "mem_state" => 1,  // 新增並登入成功
                "mem_name" => $mem_name
            ]
        ];
    }

    // 返回 JSON 格式的回應
    echo json_encode($response);

} catch (PDOException $e) {
    echo json_encode(["memInfo" => ["mem_state" => 0]]);
}
?>
