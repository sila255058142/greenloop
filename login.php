<?php
require 'init.php';

head("DashBoard");
?>


<div class="container py-4">
    <form action="controller/login.php" class="card card-body mx-auto" method="post" style="max-width: 540px;">
        <label for="" class="form-label mt-2">อีเมล</label>
        <input type="email" class="form-control" name="email" value="" required>
        <label for="" class="form-label mt-2">รหัสผ่าน</label>
        <input type="password" class="form-control" name="password" value="" id="1" minlength="8" required>
        <button class="btn btn-success mt-4" type="submit">เข้าสู่ระบบ</button>
        <div class="d-flex justify-content-between mt-2">
            <a href="forgot.php">ลืมรหัสผ่าน</a>
            <a href="register.php">สมัครสมาชิก</a>
        </div>
    </form>
</div>
<?php foot() ?>