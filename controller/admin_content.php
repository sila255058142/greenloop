<?php
require_once __DIR__ . '/../init.php';
$admin = me();
if(!$admin) go('../login.php' , 'เข้าสู่ระบบก่อน' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับแอดมิน' , 'danger');

if(isset($_POST['delete'])){
    $id = (int) $_POST['id'];
    $db->query("DELETE FROM contents WHERE id = $id");
    go('content.php' , 'ลบ');
}
if($_POST){
    $title = $_POST['title']?? '';
    $body = $_POST['body']?? '';
    $startAt = $_POST['start_at']?? '';
    $endAt = $_POST['end_at']?? '';
    $id = $_POST['id'];

    if($id > 0){
        $db->query("UPDATE contents SET title = '$title' , body = '$body' , start_at = '$startAt' , end_at = '$endAt' WHERE id = $id");
    } else {
        $adminId = (int) $admin['id'];
        $db->query("INSERT INTO contents (user_id , start_at , end_at , title , body) VALUES ($adminId , '$startAt' , '$endAt' , '$title' , '$body')");
    }
    go('content.php' , 'บันทึก');
}

$edit = [
    'id' => '',
    'title' => '',
    'body' => '',
    'start_at' => '',
    'end_at' => ''
];
$s = trim($_GET['q']?? '');
$rowContent = $db->query("SELECT * , IF(start_at > NOW() , 'รอเผยแพร่' , IF(end_at <= NOW() , 'หมดเวลา' , 'กำลังแสดง')) AS live FROM contents WHERE title LIKE '%$s%' OR body LIKE '%$s%' ORDER BY start_at DESC ")->fetch_all(MYSQLI_ASSOC);

$local = function($q){
    return $q ? date('Y-m-d H:i', strtotime($q)): null;
}
?>