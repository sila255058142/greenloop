<?php
require_once __DIR__ . '/../init.php';
$admin = me();
if(!$admin) go('../login.php' , 'เข้าสู่ระบบก่อน' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับแอดมิน' , 'danger');


$newContents = $db->query("SELECT * FROM contents WHERE (start_at <= NOW()) AND (end_at IS NULL OR end_at > NOW()) ORDER BY start_at DESC")->fetch_all(MYSQLI_ASSOC);
$sumRecycles = $db->query("SELECT COUNT(*) AS n, COALESCE(SUM(weight_kg), 0) AS kg, COALESCE(SUM(co2_kg), 0) AS co2 FROM recycles WHERE status = 'done'")->fetch_assoc();

$pendingRe = $db->query("SELECT COUNT(*) FROM recycles WHERE status = 'pending'")->fetch_row()[0];
$doneRe = $db->query("SELECT COUNT(*) FROM recycles WHERE status = 'done'")->fetch_row()[0];
$ContentAll = $db->query("SELECT COUNT(*) FROM contents ORDER BY id DESc")->fetch_row()[0];
$MC = $db->query("SELECT COUNT(*) FROM users WHERE role = 'user' AND status = 'active' ORDER BY id DESC")->fetch_row()[0];
$MCS = $db->query("SELECT COUNT(*) FROM users WHERE role = 'user' AND status = 'suspended' ORDER BY id DESC")->fetch_row()[0];
$unreadNoti = $db->query("SELECT COUNT(*) FROM notifications WHERE  user_id ")->fetch_row()[0];
 