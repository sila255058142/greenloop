<?php
require 'init.php';
require 'controller/home.php';

head('DashBoard',false);
$steps = [
    ['📦','1. แจ้งรายการ','เลือกหมวดและกรอกข้อมูลอุปกรณ์ที่ต้องการส่งรีไซเคิล','recycle.php#recycle-form'],
    ['🔎','2. รอตรวจจับ','ทีมงานตรวจสอบข้อมูล','recycle.php'],
    ['🏆','3. รับแต้มและเติบโต','เมื่อรายการสำเร็จ รับแต้มสะสมเพื่อแลกของรางวัล','points.php'],
];

$coupon = [
    ['🎫 ตัวลดราคา ','200 แต้ม','คูปองส่วนลดสำหรับการซื้อขาย','points.php'],
    ['☂️ ร่มกันฝน','400 แต้ม','ร่มสำหรับกันฝน','points.php'],
    ['🥛 แก้วน้ำเก็บความเย็น','600 แต้ม','แก้วเยติสำหรับเก็บความเย็น','points.php'],
];
?>
<div class="hero mb-4">
    <?php if($u): ?>
        <h1>สวัสดี <?= $u['name']?> 👋</h1>
        <p>สะสมแล้ว <?= $u['points']?> แต้ม</p>
        <a href="recycle.php" class="btn btn-light">♻️ เริ่มรีไซเคิล</a>
        <a href="points.php" class="btn btn-outline-light">🏆 ดูแต้ม</a>
    <?php else: ?>
        <h1>ส่งขยะอิเล็กทรอนิกส์ไปรีไซเคิล</h1>
        <p>ร่วมจัดการ E-waste อย่างถูกวิธี ลดผลกระทบต่อสิ่งแวดล้อมและรับแต้ม</p>
        <a href="register.php" class="btn btn-light">เริ่มต้นใช้งานฟรี</a>
        <a href="login.php" class="btn btn-outline-light">เช้าสู่ระบบ</a>
    <?php endif; ?>
</div>
<section class="home-impact-section">
        <div class="home-section-heading mt-5 mb-4">
            <span class="section-eyebrow">SMALL ACTION, BIG IMPACT</span>
            <h2>ผลกระทบที่สร้างร่วมกัน 🌍</h2>
            <p>ทุกชิ้นที่ส่งเข้าระบบคือ อีกก้าวหนึ่งของการจัดการ E-waste อย่างยั่งยืน</p>
        </div>
        <div class="row g-3 home-impact-grid">
            <div class="col-6 col-xl-3">
                <div class="card card-impact h-100 bg-white p-4">
                    <span class="impact-logo fs-3">👤</span>
                    <span class="impact-label">คนที่ร่วมดูแลโลก</span>
                    <strong class="text-success d-block fs-3"><?= number_format($MC)?></strong>
                    <small>สมาชิก GreenLoop</small>
                </div>
            </div>
            <div class="col-6 col-xl-3">
                <div class="card card-impact h-100 bg-white p-4">
                    <span class="impact-logo fs-3">♻️</span>
                    <span class="impact-label">ส่งต่ออย่างถูกวิธี</span>
                    <strong class="text-success d-block fs-3"><?= number_format((float)$sumRecycles['n'])?></strong>
                    <small>รายการที่รีไซเคิลสำเร็จ</small>
                </div>
            </div>
            <div class="col-6 col-xl-3">
                <div class="card card-impact h-100 bg-white p-4">
                    <span class="impact-logo fs-3">📦</span>
                    <span class="impact-label">ขยะไม่ถูกทิ้งเปล่า</span>
                    <strong class="text-success d-block fs-3"><?= number_format((float)$sumRecycles['kg'], 2)?></strong>
                    <small>กิโลกรัม E-waste</small>
                </div>
            </div>
            <div class="col-6 col-xl-3">
                <div class="card card-impact h-100 impact-card-highlight p-4">   
                    <span class="impact-logo fs-3">🌍</span>
                    <span class="impact-label">ลดการปล่อยคาร์บอน</span>
                    <strong class="text-success d-block fs-3"><?= number_format((float)$sumRecycles['co2'], 2)?></strong>
                    <small>kgCO2e จากรายการที่สำเร็จ</small>
                </div>
            </div>
        </div>
        <p class="impact-footnote mt-2">สรุปจากรายการรีไซเคิลที่ผู้ดูแลตรวจรับและยืนยันแล้ว</p>
</section>
<section class="home-journy-section">
        <div class="home-section-heading mt-5 mb-4">
            <span class="section-eyebrow">FROM E-WASTE TO NEW VALUE</span>
            <h2>ส่งรีไซเคิลแล้ว ได้อะไรบ้าง</h2>
            <p>GreenLoop ช่วยให้การจัดการขยะอิเล็กทรอนิกส์เป็นเรื่องง่ายตรวจสอบได้ และมีแรงจูงใจ</p>
        </div>
        <div class="row g-3">
            <?php foreach($steps as $index => $s): ?>
                <div class="col-md-4">
                    <a href="<?= $s[3]?>" class="card card-journy h-100 p-4 text-decoration-none">
                        <div class="journy-card-top d-flex justify-content-between gap-3">
                            <span class="journy-logo"><?= $s[0]?></span>
                            <span class="journy-number"></span>
                        </div>
                        <h3><?= $s[1]?></h3>
                        <p><?= $s[2]?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
</section>
<section class="home-campaign gap-4 mt-5 rounded-4 d-flex justify-content-between">
    <div class="campaign-decoration">🌍</div>
    <div class="campaign-copy">
        <span class="section-eyebrow">ชวนกันเปลี่ยนของเก่าให้เป็นคุณค่าใหม่</span>
        <h2>ลิ้นชักของคุณอาจะมี "ก้าวเล็ก" ซ่อนอยู่</h2>
        <small>โทรศัพท์เสีย สายฃาร์ชเก่าอุปกรณ์ทีไ่ม่ได้ใช้ ไม่ควรถูกทิ้งรวมกัน เริ่มต้นส่งต่ออย่างถูกวิธี แล้วชวนคนรอบตัว มาร่วมสร้างชุมชนที่ใส่ใจโลกไปด้วยกัน</small>
    </div>
    <a href="recycle.php" class="btn btn-light">เริ่มรีไซเคิล ♻️</a>
</section>
<section class="home-journy-section">
        <div class="home-section-heading mt-5 mb-4">
            <span class="section-eyebrow">POINTS FOR COUPON</span>
            <h2>เมื่อสะสมแต้มถึงจะได้รับรางวัล</h2>
            <p>GreenLoop ช่วยให้การจัดการขยะอิเล็กทรอนิกส์เป็นเรื่องง่ายตรวจสอบได้ และมีแรงจูงใจ</p>
        </div>
        <div class="row g-3">
            <?php foreach($coupon as $index => $c): ?>
                <div class="col-md-4">
                    <a href="<?= $s[3]?>" class="card card-journy h-100 p-4 text-decoration-none">
                        <div class="journy-card-top d-flex justify-content-between gap-3">
                            <span class="journy-logo"><?= $c[0]?></span>
                            <span class="journy-number"></span>
                        </div>
                        <h3><?= $c[1]?></h3>
                        <p><?= $c[2]?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
</section>
<section class="article-section">
    <div class="article-heading mt-5 mb-4 d-flex justify-content-between align-items-center">
        <div>
            <span>GREENLOOP JOURNAL</span>
            <h3>เรื่องเล็กๆ ที่ฃ่วยโลกได้</h3>
            <p>ข่าวสารและความรู้้เรื่อง  E-waste ที่อ่านง่ายและนำไปใฃ้ได้จริง</p>
        </div>
        <span class="article-count"><?= $FN ? count($newContents) + 1 : 0?> เรื่อง</span>
    </div>
    <?php if($FN): ?>
        <article class="card article-feature row g-0 m-0 overflow-hidden">
            <div class="article-art col-md-5 d-grid justify-content-between align-items-center position-relative">
                <!-- <span class="article-orbit">♻️</span> -->
            </div>
            <div class="article-feature-content col-md-4 pg-4 p-lg-5">
                <span class="article-label">เรื่องเด่น</span>
                <h4 class="mt-2"><?= e($FN['title'])?></h4>
                <p><?= e($FN['body'])?></p>
                <small class="text-muted">📅 <?= $FN['start_at'] ? date('d/m/Y H:i', strtotime($FN['start_at'])) : ''?></small>
            </div>
        </article>
            <?php if($newContents): ?>
                <div class="row mt-4">
                    <?php foreach ($newContents as $index => $n): ?>
                        <div class="col-md-6 col-xl-4">
                            <article class="card article-card h-100 p-4 mb-2">
                                <div class="article-card-tops d-flex align-items-center justify-content-between gap-3">
                                    <span>🌍</span>
                                    <small class="text-muted">📅<?= $n['start_at'] ? date('d/m/Y H:i', strtotime($n['start_at'])) : ''?></small>
                                </div>
                                <h4><?= e($n['title']) ?></h4>
                                <p><?= nl2br($n['body']) ?></p>
                                <small>GREENLOOP JOURNAL</small>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-secondary">ยังไม่มีข่าวในตอนนี้</div>
    <?php endif; ?>
</section>
<?php foot() ?>