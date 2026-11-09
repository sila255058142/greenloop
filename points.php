<?php
    require 'init.php';
    require 'controller/points.php';
    head('คะแนน',false);
    $medals = ['🎖️','🏅','🥇','🥈','🥉'];
    $points = (int) $u['points'];
    $currentLevel = $points >= 600 ? '🌍 Net Zero Hero':
    ($points >= 300 ? '🌳 ต้นไม้':
    ($points >= 100 ? '🌱 ต้นกล้า':
    '😏 มือใหม่'
    ));
?>
<div class="hero mb-4 text-center">
    <div class="fs-1">👤</div>
    <h2><?= $u['points']?></h2>
    <h2 class=""><?= $currentLevel?></h2>
</div>
<div class="row g-3 justify-content-center">
    <div class="col-6 col-lg-3">
        <div class="card card-body text-center mt-2">
            <span class="text-muted">✅ รีไซเคิล</span>
            <h4 class="text-success"><?= number_format($sum['n'])?> ครั้ง</h4>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card card-body text-center mt-2">
            <span class="text-muted">🌍 คาร์บอนที่ลดได้</span>
            <h4 class="text-success"><?= number_format($sum['co2'])?> kgCO2e</h4>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card card-body text-center mt-2">
            <span class="text-muted">♻️ กิโลกรัมที่รีไซเคิล</span>
            <h4 class="text-success"><?= number_format($sum['kg'])?> kg</h4>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table bg-white mb-0" id="points_table">
        <thead>
            <tr>
                <!-- <th>อันดับ</th> -->
                <th>ฃื่อ</th>
                <th>ระดับ</th>
                <th class="text-end">แต้ม</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberPoints as $i => $t): ?>
                <?php $memberLevel = match(true) {
                    $t['points'] >= 600 => '🌍 Net Zero Hero',
                    $t['points'] >= 300 => '🌳 ต้นไม้',
                    $t['points'] >= 100 => '🌱 ต้นกล้า',
                    default => '😏 มือใหม่'
                }
                ?>
                <tr class="<? $t['id'] == $u['id'] ? 'table-success' : ''?>">
                    <!-- <td><?= $medals[$i]?></td> -->
                    <td><?= e($t['name'])?></td>
                    <td><?= $memberLevel ?></td>
                    <td class="text-end"><?= $t['points']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        const table = $('#points_table').DataTable();
    });
</script>
<?php foot() ?>