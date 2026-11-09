<?php
    require '../init.php';
    require '../controller/admin_index.php';

head('daspkdmasd',false);
?>


<div class="container py-4">
    <div class="text-left">
        <h2>รายงาน DashBoard</h2>
        <button class="btn btn-success" onclick="window.print()">รายงาน</button>
    </div>
    <div class="row g-3">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-body box text-center mt-2">
                <span class="text-muted">👤 สมาชิกทั้งหมด</span>
                <h4 class="text-success"><?= number_format($MC)?></h4>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-body box text-center mt-2">
                <span class="text-muted">♻️ รายการที่รีไซเคิลสำเร็จ</span>
                <h4 class="text-success"><?= number_format($sumRecycles['n'])?></h4>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-body box text-center mt-2">
                <span class="text-muted">⏳ ขาวสารทีแสดงอยู่</span>
                <h4 class="text-success"><?= count($newContents)?></h4>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-body box text-center mt-2">
                <span class="text-muted">รายการรีไซเคิลที่รออยู่</span>
                <h4 class="text-success"><?= number_format($pendingRe)?></h4>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-body box text-center mt-2">
                <span class="text-muted">📰 รายงานทั้งหมด</span>
                <h4 class="text-success"><?= $ContentAll ?></h4>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-body box text-center mt-2">
                <span class="text-muted">🚫 บัญชีที่ถูกระงับ</span>
                <h4 class="text-success"><?= number_format($MCS)?></h4>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-body box text-center mt-2">
                <span class="text-muted">✅ รายการทีรีไซเคิลสำเร็จแล้ว</span>
                <h4 class="text-success"><?= number_format($doneRe)?></h4>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-body box text-center mt-2">
                <span class="text-muted">🔔</span>
                <h4 class="text-success"><?= $unreadNoti?></h4>
            </div>
        </div>
    </div>
</div>
<?php foot() ?>