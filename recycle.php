<?php
require 'init.php';
require 'controller/recycle.php';
head('รีไซเคิล');
?>

<div class="hero mb-4 d-flex justify0content-between">
    <div>
        <span class="fw-bold text-uppercase opacity-75 ">RECYCLE &amp; MAKE A DIFFERENT</span>
        <p>🌍 คาร์บอนที่ลดได้ในปีนี้</p>
        <h2>0.00 kgCO2e</h2>
        <p>ส่งต่อขยะอิเล็กทรอนิกส์ให้กลับมาใช้ประโยชน์ และช่วยลดผลกระทบต่อสิ่งแวดล้อม</p>
    </div>
    <div class=""></div>
</div>
<form action="" enctype="multipart/form-data" class="card border-0 shadow-0 rounded-4" method="post">
    <div class="row g-3">
        <aside class="col-md-4 p-4 d-flex justify-content-center flex-column" style="background: #cbe2d8; border-radius: 12px;">
            <div class="fs-1">♻️</div>
            <span class="fw-bold text-uppercase">GIVE IT A NEW LIFE</span>
            <h3 class="text-success fw-bold">เริ่มต้นจากของชิ้นเล็กๆ</h3>
            <p class="small text-muted">แจ้งข้อมูลอุปกรณ์และน้ำหนักโดยประมาณ ทีมงานจะตรวจสอบก่อนยืนยันการรีไซเคิล</p>
            <div class="rounded-4 bg-white px-3 py-2 fw-semibold">✨ รับ 20 แต้มสะสมต่อขนะที่รีไซเคิลสำเร็จ 1 กก. ✨</div>
        </aside>
        <div class="col-md-8 p-4 text-align-center">
            <h4 class="mt-1 fw-bold" id="recycle-form">แจ้งรายการรีไซเคิล</h4>
            <p>กรอกข้อมูลอุปกรณ์ที่ต้องการรีไซเคิล</p>
            <label for="" class="form-label mt-2">หมวดอุปกรณ์</label>
            <select name="category_id" id="recycle-category" class="form-select mt-2">
                <option value="">เลือกหมวด</option>
                <?php foreach($cats as $c):?>
                    <option value="<?= $c['id']?>" data-factor="<?= $c['co2_per_kg']?>">
                        <?= $c['name'] ?>( ลด <?= $c['co2_per_kg']?> kgCO2e ต่อ กก.)
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="" class="form-label mt-2">รายการ</label>
            <input type="text" class="form-control" name="item_name">
            <label for="" class="form-label mt-2">น้ำหนักโดยประมาณ</label>
            <input type="number" class="form-control" name="weight_kg" id="recycle-weight">
            <label for="" class="form-label mt-2">ประเภทขนส่ง</label>
            <select name="delivery_type" class="form-select mt-2">
                <option value="">เลือกประเภทขนส่ง</option>
                <option value="self">นำส่งเอง</option>
                <option value="pickup">นัดรับที่บ้าน</option>
            </select>
            <label for="" class="form-label mt-2">ที่อยู่สำหรับส่ง/ส่ง</label>
            <textarea name="address" class="form-control" row="3" maxlength="500"></textarea>
            <div>
                <p class="text-success small" id="recycle-estimate">เลือกหมวดและกรอกน้ำหนักเพื่อดูปริมาณคาร์บอน</p>
                <label for="" class="mt-2 form-label">(รูปสินค้า ไม่บังคับ JPG PNG GIF)</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <button class="btn btn-success mt-4">ส่งคำขอ</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(domcument).ready(function(){
        const $recycleCategory = $('recycle-category');
        const $recycleWeight = $('recycle-weight');
        const $estimateDisplay = $('recycle-estimate');

        const updateEstimate = () => {
            const factor = parsefloat($recycle.find('select').data('factor')) || 0;
            const weight = parsefloat($weight.val()) || 0;
            if (!factor || weight <= 0){
                $estimateDisplay.text('เลือกหมวดและกรอกน้ำหนักเพื่อดูปริมาณคาร์บอน');
                return;
            }
                const totalEstimate = factor * weight;
                const formattedEstimate = totalEstimate.toFixed(2);
                $estimateDisplay.text('คาดว่าจะได้ ${formattedEstimate}');
        };
        $category.on('change' . updateEstimate);
        $wegith.on('input' . updateEstimate);
    })
</script>