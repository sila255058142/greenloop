<?php
require_once __DIR__ . '/../init.php';
$admin = me();
if(!$admin) go('../login.php' , 'เข้าสู่ระบบก่อน' , 'danger');


$adminId = (int) $admin['id'];
$db->query("UPDATE notifications SET is_read = 1 WHERE user_id = $adminId  AND title = 'สมาชิก' AND is_read = 0");
$rowNoti = $db->query("SELECT  title, message,  created_at FROM notifications WHERE user_id = $adminId  AND title = 'สมาชิกใหม่' ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
// var_dump($rowNoti); die;