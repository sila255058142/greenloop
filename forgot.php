<?php
require 'init.php';
require 'controller/forgot.php';
head('ลืมรหัสผ่าน')
?>

<div class="container py-4">
    <form action="" class="card card-body mx-auto" method="post" style="max-width: 540px;">
        <label for="" class="form-label mt-2">อีเมล</label>
        <input type="email" class="form-control" name="email" value="" required>
        <label for="" class="form-label mt-2">คำถามกันลืมรหัสผ่าน</label>
        <select name="question" id="" class="form-select mt-2" required>
            <option value="">เลือกคำถาม</option>
            <option value="สัตว์เลี้ยง" name="">ชื่อสัตว์เลี้ยงตัวแรก</option>
        </select>
        <label for="" class="form-label mt-2">คำตอบ (ใช้ตั้งรหัสผ่านใหม่เมื่อลืม)</label>
        <input type="text" class="form-control" name="answer" value="" required>
        <label for="" class="form-label mt-2">รหัสผ่านใหม่ (อย่างน้อย 8 ตัวอักษร)</label>
        <input type="password" class="form-control" name="password" value="" id="1" minlength="8" required>
        <label for="" class="form-label mt-2">ยืนยันรหัสผ่านใหม่</label>
        <input type="password" class="form-control" name="password2" value="" id="2" required>
        <button class="btn btn-success mt-4" type="submit" name="change">เปลี่ยนรหัสผ่าน</button>
    </form>
</div>
<?php foot() ?>