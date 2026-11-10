<?php
require '../init.php';
require '../controller/admin_recycle.php';
head('จัดการข้อมูลรีไซเคิล');
?>

<div class="card card-body mx-auto">
<div class="container py-4">
    <table class="table-stripped bg-white align-middle" id="recycle_table">
        <thead>
            <tr>
                <th>รูป</th>
                <th>สมาชิก</th>
                <th>รายการ</th>
                <th>ขนส่ง</th>
                <th>ที่อยู่</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $r): ?>
                <tr>
                    <td>
                        <?php if($r['image'] !== ''): ?>
                            <a href="../upload/<?= e($r['image'])?>" target="_blank" rel="noopener">
                                <img src="../upload/<?= e($r['image'])?>" alt="รูปสินค้า" style="max-width: 70px; max-height: 50px; object-fit: cover;">
                            </a>
                        <?php else: ?>
                            -   
                        <?php endif; ?>
                    </td>
                    <td><?= e($r['member'])?></td>
                    <td><?= e($r['item_name'])?></td>
                    <td><?= e($r['delivery_type'])?></td>
                    <td><?= nl2br($r['address'])?></td>
                    <td>
                        <?php if ($r['status'] == 'pending'): ?>
                            <form action="" method="post" class="d-flex gap-2">
                                <input type="hidden" name="id" value="<?= $r['id']?>">
                                <button class="btn btn-sm btn-success" type="submit" name="approve">ตรวจรับ</button>
                                <button class="btn btn-sm btn-danger" type="submit" name="reject" formnovalidation onclick="return confirm('ปฏิเสธคำขอนี้')">ปฏิเสธ</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<script>
    $(document).ready(function(){
        const table = $('#recycle_table').DataTable();
    });
</script>
<?php foot() ?>