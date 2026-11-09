<?php
require 'init.php';
require 'controller/profile.php';
head("โปรไฟล์")
?>


<div class="container py-4">
    <div class="row g-3">
        <div class="col-lg-6">
            <form action="" class="card card-body mx-auto" method ="post">
                <div class="text-align">
                    <span class="fs-1">👤</span>
                </div>
            <label for="" class="form-label mt-2">ชื่อ-นามสกุล</label>
            <input type="text" class="form-control" name="name" value="<?= $u['name']?>" required>
            <label for="" class="form-label mt-2">อีเมล</label>
            <input type="email" class="form-control" name="email" value="<?= $u['email']?>" required>
            <label for="" class="form-label mt-2">เบอร์โทรศัพท์ (ตัวเลข 10 หลัก)</label>
            <input type="phone" class="form-control" name="phone" value="<?= $u['phone']?>" pattern="0[0-9]{0,9}" title="ตัวเลข 10 ตัวชค้นต้นด้วย 0" required>
            <button class="btn btn-success mt-4" type="submit" name="save">บันทึก</button>
            </form>
        </div>
        <div class="col-lg-6">
            <form action="" class="card card-body mx-auto" method ="post">
            <label for="" class="form-label mt-2">รหัสผ่านปัจจุบัน</label>
            <input type="password" class="form-control" name="current" value="" required>
            <label for="" class="form-label mt-2">รหัสผ่านใหม่ (อย่างน้อย 8 ตัวอักษร)</label>
            <input type="password" class="form-control" name="password" value="" minlength="8" required>
            <label for="" class="form-label mt-2">ยืนยันรหัสผ่าน</label>
            <input type="password" class="form-control" name="password2" value=""  required>
            <button class="btn btn-outline-success mt-4" type="submit" name="change">เปลี่ยนรหัสผ่าน</button>
            </form>
        </div>
    </div>
</div>
<?php foot() ?>