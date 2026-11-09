<?php
require 'init.php';
head("สมัครสมาชิก");
$u = me();
?>


<div class="container py-4">
    <form action="controller/register.php" class="card card-body mx-auto mt-2" method="post" onsubmit="return checkPassword()" style="max-width: 540px;">  
        <label for="" class="form-label mt-2">ชื่อ-นามสกุล</label>
        <input type="text" class="form-control" name="name" value="" required>
        <label for="" class="form-label mt-2">อีเมล</label>
        <input type="email" class="form-control" name="email" value="" required>
        <label for="" class="form-label mt-2">เบอร์โทรศัพท์ (ตัวเลข 10 หลัก)</label>
        <input type="phone" class="form-control" name="phone" value="" pattern="0[0-9]{0,9}" title="ตัวเลข 10 ตัวชค้นต้นด้วย 0" required>
        <label for="" class="form-label mt-2">รหัสผ่าน (อย่างน้อย 8 ตัวอักษร)</label>
        <input type="password" class="form-control" name="password" value="" id="1" minlength="8" required>
        <label for="" class="form-label mt-2">ยืนยันรหัสผ่าน</label>
        <input type="password" class="form-control" name="password" value="" id="2" required>
        <label for="" class="form-label mt-2">คำถามกันลืมรหัสผ่าน</label>
        <select name="question" id="" class="form-select mt-2" required>
            <option value="">เลือกคำถาม</option>
            <option value="สัตว์เลี้ยง" name="">ชื่อสัตว์เลี้ยงตัวแรก</option>
        </select>
        <label for="" class="form-label mt-2">คำตอบ (ใช้ตั้งรหัสผ่านใหม่เมื่อลืม)</label>
        <input type="text" class="form-control" name="answer" value="" required>
        <button class="btn btn-success mt-3" type="submit">สมัครสมาชิก</button>
    </form>
</div>
<script>
    function checkPassword() {
        if ($('#1').val() == $('#2').val()) {
            return true;
        }
            alert('รหัสผ่านไม่ตรงกันโปรดกรอกใหม่');
            return false;
    }
</script>
<?php
foot()
?>
