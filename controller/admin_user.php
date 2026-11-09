<?php
require_once __DIR__ . '/../init.php';
$admin = me();
if(!$admin) go('../login.php' , 'เข้าสู่ระบบก่อน' , 'danger');
if($admin['role'] !== 'admin') go('../login.php' , 'สำหรับแอดมิน' , 'danger');


if(isset($_POST['T'])){
    $uId = $_POST['id'];
    if($uId > 0){
        $db->query("UPDATE users SET status = IF(status = 'active' , 'suspended' , 'active') WHERE id = $uId");
    }
    go('user.php' , 'อัพเดท');
}
$rowUser  = $db->query("SELECT * FROM users WHERE role = 'user' ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);