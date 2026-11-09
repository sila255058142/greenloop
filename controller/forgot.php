<?php
require_once __DIR__ . '/../init.php';
if(isset($_POST['change'])){
    $email = trim($_POST['email']?? '');
    $question = trim($_POST['question']?? '');
    $answer = $_POST['answer']?? '';
    $password = $_POST['password']?? '';
    $password2 = $_POST['password2']?? '';

    if(strlen($password) < 8){
        go('forgot.php' , 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร', 'danger');
    }
    if($password !== $password2){
        go('forgot.php' , 'รหัสผ่านไม่ตรงกัน', 'danger');
    }

    $emailEscaped = $db->real_escape_string($email);
    $result = $db->query("SELECT id, question, answer FROM users WHERE email = '$emailEscaped'");
    if(!$result){
        go('forgot.php' , 'ไม่สามารถตรวจสอบข้อมูลได้ กรุณาลองอีกครั้ง', 'danger');
    }
    $user = $result->fetch_assoc();

    if(!$user){
        go('forgot.php' , 'ไม่พบบัญชีอีเมลนี้', 'danger');
    }
    if($user['question'] !== $question || !password_verify($answer, $user['answer'])){
        go('forgot.php' , 'คำถามหรือคำตอบไม่ถูกต้อง' , 'danger');
    }

    $ph = password_hash($password, PASSWORD_DEFAULT);
    $userId = (int) $user['id'];
    $passwordEscaped = $db->real_escape_string($ph);
    if(!$db->query("UPDATE users SET password = '$passwordEscaped' WHERE id = $userId")){
        go('forgot.php' , 'ไม่สามารถเปลี่ยนรหัสผ่านได้ กรุณาลองอีกครั้ง', 'danger');
    }

    go('login.php' , 'อัพเดทรหัสผ่าน');
}



    
