<?php
require_once __DIR__ . '/../init.php';
$u=me();
if(!$u) go('../login.php' , 'เข้าสู่ระบบก่อน' ,'danger' );

if(isset($_POST['save'])){
    $name = $db->real_escape_string(trim($_POST['name']?? ''));
    $email = $db->real_escape_string(trim($_POST['email']?? ''));
    $phone = $db->real_escape_string(trim($_POST['phone']?? ''));
    $uId = (int) $u['id'];

    $db->query("UPDATE users SET name = '$name' , email = '$email' , phone = '$phone' WHERE id = $uId");

    $_SESSION['user']['name'] = trim($_POST['name']?? '');
    $_SESSION['user']['email'] = trim($_POST['email']?? '');
    $_SESSION['user']['phone'] = trim($_POST['phone']?? '');

    go('profile.php' , 'แก้ไขโปรไฟล์');
}
if(isset($_POST['change'])){
    $current = $_POST['current']?? '';
    $password = $_POST['password']?? '';
    $password2 = $_POST['password2']?? '';
    $uId = (int) $u['id'];

    $passwordRow = $db->query("SELECT password FROM users WHERE id = $uId")->fetch_assoc();

    $ph = password_hash($password, PASSWORD_DEFAULT);
    $passwordEscaped = $db->real_escape_string($ph);
    if(!$db->query("UPDATE users SET password = '$passwordEscaped' WHERE id = $uId")){
        go('profile.php', 'เปลี่ยนรหัสผ่านไม่สำเร็จ กรุณาลองอีกครั้ง', 'danger');
    }

    go('profile.php' , 'เปลี่ยนรหัสผ่าน');
}
?>