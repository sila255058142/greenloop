<?php
require_once __DIR__ . '/../controller/admin_notifications.php';

head('การแจ้งเตือน');
?>


<div class="container py-4">
    <?php foreach ($rowNoti as $r): ?>
        <div class="card card-body">
            <b><?= e($r['title'])?></b>
            <br>
            <?= e($r['message'])?>
            <br>
            <small><?= $r['created_at'] ? date('d/m/Y H:i', strtotime($r['created_at'])): ''?></small>
        </div>
    <?php endforeach; ?>
    <?php if(!$rowNoti):?>
        <div class="alert alert-secondary">ยังไม่มีการแจ้งเตือนในตอนนี้</div>
    <?php endif; ?>
</div>
<?php foot() ?>