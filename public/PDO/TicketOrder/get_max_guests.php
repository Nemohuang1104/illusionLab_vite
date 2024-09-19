// get_max_guests.php
<?php
include 'db_connect.php'; // 資料庫連接

$eventId = $_GET['event_id'];

// 查詢該活動的最大人數
$sql = "SELECT TICKET_SET FROM EVENT WHERE EVENT_ID = '$eventId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['maxGuests' => $row['TICKET_SET']]);
} else {
    echo json_encode(['error' => '無法找到該活動']);
}

$conn->close();
?>
