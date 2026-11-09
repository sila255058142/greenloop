<?php
    function head($title, $show=true){
        $u = me();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= str_contains($_SERVER['SCRIPT_NAME'], '/admin/') ? '../' : ''?>">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="lib/datatables.css">
    <script src="lib/jquery.min.js"></script>
    <script src="lib/datatables.js"></script>
    <script src="lib/chart.umd.js"></script>
    <script src="assets/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark d-print-none">
        <div class="container">
            <a href="<?= ($u && $u['role'] === 'admin' ? 'admin/index.php' : 'index.php')?>" class="navbar-brand fw-bold">♻️ GreenLoop</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu" type="button" aria-expand="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">🍔</span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <div class="navbar-nav me-auto">
                    <?php if($u && $u['role'] == 'admin'):?>
                        <a href="admin/index.php" class="nav-link">จัดการข้อมูล DashBoard</a>
                        <a href="admin/user.php" class="nav-link">จัดการข้อมูลผู้ใช้</a>
                        <a href="admin/content.php" class="nav-link">จัดการข้อมูลเนื้อหา</a>
                        <a href="admin/recycle.php" class="nav-link">จัดการข้อมูลรีไซเคิล</a>
                    <?php elseif($u): ?>
                        <a href="recycle.php" class="nav-link">♻️ รีไซเคิล</a>
                        <a href="points.php" class="nav-link">🏆 แต้มของฉัน</a>
                        <a href="profile.php" class="nav-link">👤 โปรไฟล์</a>
                    <?php endif; ?>
                </div>
                <div class="navbar-nav p-0 align-items-lg-center">
                    <?php if(!$u): ?>
                        <a href="login.php" class="nav-link">เข้าสู่ระบบ</a>
                        <a href="register.php" class="nav-link">สมัครสมาชิก</a>
                    <?php else: ?>
                        <?php if($u['role'] == 'admin'):?>
                            <a href="admin/notification.php">🔔</a>
                        <?php endif;?>
                            <span class="text-white"><?= $u['name']?></span>
                            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <main class="container py-4">
        <?php if(isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?= $_SESSION['flash'][1]?>">
                <?= $_SESSION['flash'][0] ?>
            </div>
            <?php unset($_SESSION['flash']) ?>
        <?php endif; ?>
    <?php if($show): ?>
        <h2 class="mt-2"><?= $title ?></h2>
    <?php endif; ?>
<?php
}
    function foot() {
        echo '</main><footer class="small text-muted text-center text-muted d-print-none mt-4 mb-5">♻️ GreenLoop | วัดคาร์บอน ลดด้วยการรีไซเคิล เพื่อโลกที่ยั่งยืน</footer></body></html>';
    }
?>