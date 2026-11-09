<?php
 require '../init.php';
    require '../controller/admin_content.php';
    
head('จัดการข้อมูลเนื้อหา');  
    if(!empty($_GET['edit'])){
        $uId = $_GET['edit']?? '';
        $row = $db->query("SELECT * FROM contents WHERE id = $uId")->fetch_assoc();

?>

<form action="" method="post" class="card card-body mx-auto">
    <h3><?= $row['id'] ? 'แก้ไขเนื้อหา' : 'เพิ่มเนื้อหา'?></h3>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <label for="" class="form-label mt-2">หัวข้อ</label>
    <input type="text" class="form-select" name="title" value="<?= e($row['title'])?>" minlength="3" required>
    <label for="" class="form-label mt-2">เนื้อหา</label>
    <textarea name="body" id="" class="form-select" maxlength="500" required><?= e($row['body'])?></textarea>
    <div class="row mt-2">
        <div class="col-md-6">
            <label for="" class="form-label mt-2">เริ่มแสดงผล</label>
            <input type="datetime-local" class="form-label" name="start_at" value="<?= e($local($row['start_at']))?>">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label mt-2">สิ้นสุดการแสดงผล</label>
            <input type="datetime-local" class="form-label" name="end_at" value="<?= e($local($row['end_at']))?>">
        </div>
        <input type="hidden" id="Id" value="<?= $id ?>">
    </div>
    <div class="mt2">
        <button class="btn btn-success" name="editId">บันทึก</button>
        <a href="admin/content.php" class="btn btn-outline-secondary">ล้างฟอร์ม</a>
    </div>
</form>
<?php 
}else{
?>
<form action="" method="post" class="card card-body mx-auto">
    <h3><?= $edit['id'] ? 'แก้ไขเนื้อหา' : 'เพิ่มเนื้อหา'?></h3>
    <input type="hidden" name="id" value="<?= $edit['id'] ?>">
    <label for="" class="form-label mt-2">หัวข้อ</label>
    <input type="text" class="form-select" name="title" value="<?= e($edit['title'])?>" minlength="3" required>
    <label for="" class="form-label mt-2">เนื้อหา</label>
    <textarea name="body" id="" class="form-select" maxlength="500" required><?= e($edit['body'])?></textarea>
    <div class="row mt-2">
        <div class="col-md-6">
            <label for="" class="form-label mt-2">เริ่มแสดงผล</label>
            <input type="datetime-local" class="form-label" name="start_at" value="<?= e($local($edit['start_at']))?>">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label mt-2">สิ้นสุดการแสดงผล</label>
            <input type="datetime-local" class="form-label" name="end_at" value="<?= e($local($edit['end_at']))?>">
        </div>
        <input type="hidden" id="Id" value="<?= $id ?>">
    </div>
    <div class="mt2">
        <button class="btn btn-success" name="editId">บันทึก</button>
        <a href="admin/content.php" class="btn btn-outline-secondary">ล้างฟอร์ม</a>
    </div>
</form>
<?php
}
?>
<div class="table-responsive">
    <table class="table table-stripped bg-white text-middle" id="content_table">
        <thead>
            <tr>
                <th>หัวข้อ</th>
                <th>เริ่มแสดง</th>
                <th>สิ้นสุด</th>
                <th>สถานะ</th>
                <th>จัดการข้อมูลเนื้อหา</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rowContent as $r): ?>
            <tr>
                <td><?= e($r['title'])?></td>
                <td><?= $r['start_at'] ? date('d/m/Y H:i', strtotime($r['start_at'])) : ''?></td>
                <td><?= $r['end_at'] ? date('d/m/Y H:i', strtotime($r['end_at'])) : ''?></td>
                <td><?= e($r['live'])?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $r['id']?>">
                        <a type="button" href="admin/content.php?edit=<?= $r['id']?>" name="edit" class="btn btn-outllne-danger">แก้ไข</a>
                        <button class="btn btn-outline-danger" name="delete" onclick="return confirm('ยืนยันการลบเนื้อหานี้?')">ลบ</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        const table = $('#content_table').DataTable();
    });
</script>
<?php foot() ?>