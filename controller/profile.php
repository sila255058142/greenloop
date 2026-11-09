<?php
require_once __DIR__ . '/../init.php';
$u=me();
if(!$u) go('../login.php' , 'เข้าสู่ระบบก่อน' ,'danger' );

if(isset($_POST['save'])){
    $name = $_POST['name']?? '';
    $email = $_POST['email']?? '';
    $phone = $_POST['phone']?? '';
    $uId = (int) $u['id'];

    $db->query("UPDATE users SET name = '$name' , email = '$email' , phone = '$phone' WHERE id = $uId");

    $_SESSION['user']['name'] = trim($_POST['name']);
    $_SESSION['user']['email'] = trim($_POST['email']);
    $_SESSION['user']['phone'] = trim($_POST['phone']);

    go('profile.php' , 'แก้ไขโปรไฟล์');
}
if(isset($_POST['change'])){
    $password = $_POST['password']?? '';
    $uId = (int) $u['id'];

    $ph = password_hash($password, PASSWORD_DEFAULT);
    $db->query("UPDATE users SET password = '$ph' WHERE id = $uId");

    go('profile.php' , 'เปลี่ยนรหัสผ่าน');
}
?>