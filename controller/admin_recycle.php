<?php
require_once __DIR__ . '/../init.php';
$admin = me();
if(!$admin) go('../login.php' , 'เข้าสู่ระบบก่อน' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับแอดมิน' , 'danger');



if(isset($_POST['reject'])){
    $rId = (int) $_POST['id'];
    $db->query("UPDATE recycles SET status = 'rejected' WHERE id = $rId");
    go('recycle.php' , 'ปฏิเสธ'); 
}
if(isset($_POST['approve'])){
        $rId = (int) $_POST['id'];
        $r = $db->query("SELECT r.weight_kg ,r.user_id, c.co2_per_kg FROM recycles r JOIN categories c ON c.id = r.category_id WHERE r.id = $rId AND  r.status = 'pending'")->fetch_assoc();
        // var_dump($r);die;
        $points = round($r['weight_kg'] * 20);
        $co2 = $r['weight_kg'] * $r['co2_per_kg'];
        $userId = (int) $r['user_id'];

        $db->query("UPDATE recycles SET points = $points , co2_kg = $co2 , status = 'done' WHERE id = $rId");
        $db->query("UPDATE users SET points = points + $points WHERE id = $userId");
        $db->query("INSERT INTO point_transactions (amount , user_id , related_type , related_id , description) VALUES ($points , $userId , 'recycles' ,$rId , 'แต้มรีไซเคิล')");

        go('recycle.php' , "ได้รับ $points");

}

$rows = $db->query("SELECT u.name AS member , r.id , r.address , r.item_name , r.image , r.delivery_type , r.status  FROM recycles r JOIN users u ON u.id = r.user_id ORDER BY r.id DESC")->fetch_all(MYSQLI_ASSOC);

?>