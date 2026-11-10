<?php
require_once __DIR__ . '/../init.php';
$u = me();
if(!$u) go('../login.php' , 'เข้าสู่ระบบก่อน' ,'danger' );

$cats = $db->query("SELECT * FROM categories ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
$uId = (int) $u['id'];
if($_POST){
    $cateId = (int) ($_POST['category_id']?? 0);
    $item = trim($_POST['item_name']?? '');
    $deli = trim($_POST['delivery_type']?? '');
    $address = trim($_POST['address']?? '');
    $weight = (float) ($_POST['weight_kg']?? 0);

    $image = upload('image');
    $db->execute_query("INSERT INTO recycles (category_id, item_name, delivery_type, address, weight_kg, image, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)", [$cateId, $item, $deli, $address, $weight, $image, $uId]);

    go('recycle.php#recycle-form' , 'ส่งคำขอ');
}
$years = date('Y');
$saved = $db->query("SELECT COALESCE(SUM(weight_kg), 0) AS total FROM recycles WHERE user_id = $uId AND status = 'done'")->fetch_row()['total']?? null;

// var_dump($u['id']); die;