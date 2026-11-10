<?php
require_once __DIR__ . '/../init.php';
$u = me();

$name = $_POST['name']?? '';
$email = $_POST['email']?? '';
$phone = $_POST['phone']?? '';
$password = $_POST['password']?? '';
$question = $_POST['question']?? '';
$answer = $_POST['answer']?? '';

$ph = password_hash($password, PASSWORD_DEFAULT);
$ah = password_hash($answer , PASSWORD_DEFAULT);

$db->query("INSERT INTO users (name , email, phone, password, question, answer) VALUES ('$name' , '$email' , '$phone' ,'$ph', '$question' , '$ah' )");

$safeName = $db->real_escape_string($name);
$db->query("INSERT INTO notifications (user_id , title, message , link) SELECT id, 'สมาชิกใหม่' , CONCAT('$safeName' , ' สมัครสมาชิกสำเร็จ') , 'admin/users.php' FROM users WHERE role = 'admin'");

go('../login.php' , 'สมัครสมาชิกสำเร็จ');




