<?php
require_once __DIR__ . '/../init.php';
$email = $_POST['email']?? '';
$password = $_POST['password']?? '';

$user = $db->query("SELECT * FROM users WHERE email = '$email'")->fetch_assoc();

if(!$user || !password_verify($password , $user['password'])) go('../login.php' , 'รหัสผ่านไม่ตรงกัน' , 'danger');
if($user['status'] === 'suspended') go('../login.php' , 'บัญชีถูกระงับ' , 'danger');

session_regenerate_id(true);
$_SESSION['uid'] = $_SESSION['user_id'] = $user['id'];
$_SESSION['name'] = $user['name'];
$_SESSION['role'] = $user['role'];
$_SESSION['status'] = $user['status'];
unset($user['password'] , $user['answer']);
$_SESSION['user'] = $user;

go($user['role'] === 'admin' ? '../admin/index.php' : '../index.php' , 'เข้าสู่ระบบ');

?>