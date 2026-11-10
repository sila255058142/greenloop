<?php
session_start();
require_once __DIR__ . '/conn/db.php';

function me(){
    return !empty($_SESSION['uid'])? ($_SESSION['user']?? null) : null;
}

function go($url , $msg = '' , $type = 'success'){
    if($msg){
         $_SESSION['flash'] = [$msg , $type]; 
    }
    header("Location: $url"); exit;
}

function e($value){
    return htmlspecialchars((string) $value ,ENT_QUOTES , 'UTF-8');
}



function upload($f){
    $file = $_FILES[$f]?? [];
    $upload = __DIR__ . '/upload';
    $name = bin2hex(random_bytes(16)) . '.' . pathinfo($file['name']?? '', PATHINFO_EXTENSION);
    @mkdir($upload, 0755, true);
    return empty($file['name']) ? '' : (move_uploaded_file($file['tmp_name'], $upload . '/' . $name) ? $name : false);
}
require_once __DIR__. '/header.php';
?>