<?php
require_once __DIR__ . '/../init.php';
$u=me();
if(!$u) go('../login.php' , 'เข้าสู่ระบบก่อน' ,'danger' );


$uId = (int) $u['id'];
$sum = $db->query("SELECT COUNT(*) AS n, COALESCE(SUM(weight_kg), 0 )AS kg , COALESCE(SUM(co2_kg), 0) AS co2 FROM recycles WHERE status = 'done'")->fetch_assoc();
$memberPoints = $db->query("SELECT id,name,points FROM users WHERE status = 'active' AND role = 'user' ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);

