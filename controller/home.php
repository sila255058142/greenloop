<?php
require_once __DIR__ . '/../init.php';
$u=me();

$newContents = $db->query("SELECT * FROM contents WHERE (start_at <= NOW()) AND (end_at IS NULL OR end_at > NOW()) ORDER BY start_at DESC")->fetch_all(MYSQLI_ASSOC);
$FN = $newContents ? array_shift($newContents) : null;
$sumRecycles = $db->query("SELECT COUNT(*) AS n, COALESCE(SUM(weight_kg), 0) AS kg, COALESCE(SUM(co2_kg), 0) AS co2 FROM recycles WHERE status = 'done'")->fetch_assoc();
$MC = $db->query("SELECT COUNT(*) FROM users WHERE role = 'user' AND status = 'active' ORDER BY id DESC")->fetch_row()[0];



?>