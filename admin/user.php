<?php
require '../init.php';
require '../controller/admin_user.php';

head('จัดการข้อมูลผู้ใช้');
?>

<div class="card card-body mx-auto">
<div class="table-responsive">
    <table class="table table-stripped bg-white text-middle" id="user_table">
        <thead>
            <tr>
                <th>ชื่อ</th>
                <th>อีเมล</th>
                <th>เบอร์โทร</th>
                <th>แต้ม</th>
                <th>สถานะ</th>
                <th>เปลี่ยนสิทธฺ์ผู้ใช้</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rowUser  as $r): ?>
            <tr>
                <td><?= e($r['name'])?></td>
                <td><?= e($r['email'])?></td>
                <td><?= e($r['phone'])?></td>
                <td><?= e($r['points'])?></td>
                <td><?= $r['status'] == 'active' ? 'ระงับสิทธ์' : 'ยกเลิกระงับสิทธ์' ?></td>
                <td>
                    <form action="" class="d-flex gap-2" method="post">
                        <input type="hidden" name="id" value="<?= $r['id'] ?>">
                        <button value="1" class="btn btn-outline-<?= $r['status'] == 'active' ? 'succes' : 'danger'?>" name="T">
                            <?= $r['status'] == 'active' ? 'ระงับสิทธ์' : 'ยกเลิกการระงับสิทธ์'?>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<script>
    $(document).ready(function(){
        const table = $('#user_table').DataTable();
    });
</script>
<?php foot() ?>